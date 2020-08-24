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

class AmenityController extends Controller
{
    public function amenitiesTable($id){
        $amenities = Property::find($id)->property_amenities();
        return DataTables::make($amenities->with('amenity')->get())
            ->addColumn('action',function(PropertyAmenity $amenity){
                return "
                    <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".route('admin.form.submission.property.amenity.delete',$amenity->id)."' data-hover='tooltip' data-original-title='Delete Amenity'><i class='la la-trash'></i></button>
                ";
            })
            ->toJson();
        dd($amenities);
    }

    public function deleteAmenity($id){
        $amenity = PropertyAmenity::find($id);

        if($amenity->delete()):
            return Notify::send('success', 'Amenity Deleted Successfully.')->reload('table','AmenitiesTable')->json();
        endif;
        return Notify::send('error', 'Can\' Delete Amenity, Please Try Again Later.')->json();
    }
}
