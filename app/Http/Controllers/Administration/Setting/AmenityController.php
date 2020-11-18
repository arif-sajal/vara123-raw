<?php

namespace App\Http\Controllers\Administration\Setting;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Administration\Setting\Amenity\Add;
use App\Http\Requests\Administration\Setting\Amenity\Update;
use Library\Notify\Facades\Notify;

class AmenityController extends Controller
{
    public function amenity_list(){
        return view('administration.tabs.setting.amenity');
    }

    public function amenity_table(){
        $amenities = Amenity::query();
        return DataTables::make($amenities->latest()->get())
            ->rawColumns(['action'])
            ->editColumn('property_type_id', function(Amenity $amenities){
                return $amenities->property_type->name;
                
            })
            ->editColumn('provider_id', function(Amenity $amenities){
                return $amenities->provider->first_name;
                
            })
            ->addColumn('action',function(Amenity $amenity){
                return "
                        <button class='btn btn-sm btn-info' data-content='"
                    .route('app.modal.setting.amenity.edit',$amenity->id)."
                        ' data-hover='tooltip' data-original-title='Edit 'data-target='#myModal'
                        data-toggle='modal'><i class='la la-pencil'></i></button>

                        <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".
                    route('app.modal.setting.amenity.delete',$amenity->id)."' data-hover='tooltip'
                        data-original-title='Delete '><i class='la la-trash'></i></button>
                    ";
            })
            ->toJson();
    }

    public function add_modal(){
        return view('administration.modals.amenity.add');
    }

    public function add_amenity(Add $request){
        $amenity = new Amenity();

        $amenity->name = $request->name;
        $amenity->icon = $request->icon;
        $amenity->property_type_id = $request->property_type_id;
        $amenity->provider_id = $request->provider_id;

        if($amenity->save()):
            return Notify::send('success','Amenity Added')->reload('table','AmenityTable')->json();
        endif;
    }

    public function edit_modal($id){
        $amenity = Amenity::find($id);
        return view('administration.modals.amenity.edit', compact('amenity'));
    }

    public function update_amenity(Update $request, $id){
        $amenity = Amenity::find($id);

        $amenity->name = $request->name;
        $amenity->icon = $request->icon;
        $amenity->property_type_id = $request->property_type_id;
        $amenity->provider_id = $request->provider_id;

        if($amenity->save()):
            return Notify::send('success','Amenity Updated')->reload('table','AmenityTable')->json();
        endif;
    }

    public function delete_amenity($id){
        $amenity = Amenity::find($id);

        if($amenity->delete()):
            return Notify::send('success','Amenity Deleted')->reload('table','AmenityTable')->json();
        endif;
    }
}
