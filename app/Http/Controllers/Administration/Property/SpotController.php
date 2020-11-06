<?php

namespace App\Http\Controllers\Administration\Property;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Property\Spot\Add;
use App\Http\Requests\Administration\Property\Spot\Update;
use App\Models\PropertySpot;
use App\Models\Property;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Library\Notify\Facades\Notify;
use Yajra\DataTables\Facades\DataTables;

class SpotController extends Controller
{
    public function spotTable($id){
        $spots = Property::find($id)->spots();
        return DataTables::make($spots)
            ->editColumn('property_id', function(PropertySpot $spot){
                return $spot->property->name;
            })
            ->editColumn('provider_id', function(PropertySpot $spot){
                return $spot->provider->first_name .' '. $spot->provider->last_name;
            })
            ->addColumn('action',function(PropertySpot $spot){
                return "
                    <button class='btn btn-sm btn-primary' data-toggle='modal' data-target='#myModal' data-content='".route('app.modal.property.spot.view',$spot->id)."' data-hover='tooltip' data-original-title='View Room'><i class='la la-eye'></i></button>
                    <button class='btn btn-sm btn-success' data-toggle='modal' data-target='#myModal' data-content='".route('app.modal.property.spot.edit',$spot->id)."' data-hover='tooltip' data-original-title='Edit Billing'><i class='la la-dollar'></i></button>
                    <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".route('app.form.submission.property.spot.delete',$spot->id)."' data-hover='tooltip' data-original-title='Delete Room'><i class='la la-trash'></i></button>
                ";
            })
            ->toJson();
    }

    public function spotAddModal($id){
        $property = Property::find($id);
        $providers = Provider::all();
        return view('administration.modals.property.spot.add',compact('property','providers'));
    }

    public function addSpot(Add $request, $id){
        $property = Property::find($id);
        $spot = new PropertySpot();

        $spot->name = $request->name;
        $spot->description = $request->description;
        $spot->total = $request->total;
        $spot->available = $request->available;
        $spot->booked = $request->booked;
        $spot->provider_id = $request->provider;
        $spot->property_id = $property->id;
        if($request->image):
            $spot->featured_image = Storage::putFile('spot', $request->file('image'));
        endif;
        if($spot->Save()):
            return Notify::send('success','Spot Added Successfully.')->reload('table','SpotTable')->json();
        endif;
    }

    public function spotViewModal($id){
        $spot = PropertySpot::find($id);
        return view('administration.modals.property.spot.view',compact('spot'));
    }

    public function spotEditModal($id){
        $spot = PropertySpot::find($id);
        $providers = Provider::all();
        return view('administration.modals.property.spot.edit',compact('spot','providers'));
    }

    public function updateSpot(Update $request, $id){
        $spot = PropertySpot::find($id);
        $spot->name = $request->name;
        $spot->description = $request->description;
        $spot->total = $request->total;
        $spot->available = $request->available;
        $spot->booked = $request->booked;
        $spot->provider_id = $request->provider;

        if($request->image):
            if(Storage::exists($spot->featured_image)):
                Storage::delete($spot->featured_image);
            endif;
            $spot->featured_image = Storage::putFile('spot', $request->file('image'));
        endif;

        if( $spot->save() ):
            return Notify::Send('success','Spot updated successfully')->reload('table','SpotTable')->json();
        endif;
    }

    public function deleteSpot($id){
        $spot = PropertySpot::find($id);

        if($spot->featured_image != NULL):
            if(Storage::exists($spot->featured_image)):
                Storage::delete($spot->featured_image);
            endif;
        endif;

        if($spot->delete()):
            return Notify::Send('success','Spot deleted successfully')->reload('table','SpotTable')->json();
        endif;
    }
}
