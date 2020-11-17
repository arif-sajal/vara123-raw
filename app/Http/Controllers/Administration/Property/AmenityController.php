<?php

namespace App\Http\Controllers\Administration\Property;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\PropertyRoom;
use Illuminate\Http\Request;
use Library\Notify\Facades\Notify;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Administration\Property\Amenity\Add;
use App\Http\Requests\Administration\Property\Amenity\Update;

class AmenityController extends Controller
{
    public function amenitiesTable($id)
    {
        $amenities = Property::find($id)->property_amenities();
        return DataTables::make($amenities->with('amenity')->get())
            ->editColumn('amenity.property_type_id', function(PropertyAmenity $amenity){
                return $amenity->amenity->property_type->name;
            })
            ->addColumn('action', function (PropertyAmenity $amenity) {
                return "
                <button class='btn btn-sm btn-success' data-toggle='modal' data-target='#myModal' data-content='" . route('app.modal.property.aminities.edit', $amenity->id) . "' data-hover='tooltip' data-original-title='View Amenity'><i class='la la-dollar'></i></button>
                    <button class='btn btn-sm btn-danger' data-action='confirm'
                     data-action-route='" . route('app.form.submission.property.amenity.delete', $amenity->id) .
                    "' data-hover='tooltip' data-original-title='Delete Amenity'><i class='la la-trash'>
                      </i></button>
                ";
            })
            ->toJson();
    }

    public function addAminitiesView($id)
    {
        $property = Property::find($id);
        return view('administration.modals.property.amenity.add')->with('property', $property);
    }

    public function addAmenity(Add $request, $id)
    {
        $property = Property::find($id);
        $amenity = new Amenity();

        $amenity->name = $request->name;
        $amenity->icon = $request->icon;
        $amenity->property_type_id = $request->property_type_id;

        if ($amenity->save()) :
            $property_amenity = new PropertyAmenity();
            $property_amenity->property_id = $property->id;
            $property_amenity->amenity_id = $amenity->id;
            if ($property_amenity->save()) :
                return Notify::send('success', 'Amenity added successfully')->reload('table', 'AmenitiesTable')->json();
            endif;
        endif;
    }

    public function editAminitiesView($id)
    {
        $property_amenity = PropertyAmenity::find($id);
        $amenity = Amenity::find($property_amenity->amenity_id);
        return view('administration.modals.property.amenity.edit')->with('amenity', $amenity);
    }

    public function updateAmenity(Update $request, $id){
        $amenity = Amenity::find($id);

        $amenity->name = $request->name;
        $amenity->icon = $request->icon;
        $amenity->property_type_id = $request->property_type_id;

        if ($amenity->save()) :
            return Notify::send('success', 'Amenity updated successfully')->reload('table', 'AmenitiesTable')->json();

        endif;
    }


    public function deleteAmenity($id)
    {
        $amenity = PropertyAmenity::find($id);

        if ($amenity->delete()) :
            return Notify::send('success', 'Amenity Deleted Successfully.')->reload('table', 'AmenitiesTable')->json();
        endif;
        return Notify::send('error', 'Can\' Delete Amenity, Please Try Again Later.')->json();
    }
}
