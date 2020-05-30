<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function propertiesView(){
        $properties = Property::query();

        if(auth('provider')->check()):
            $properties->where('provider_id',auth('provider')->id());
        endif;

        return view('administration.pages.property.all',['properties'=>$properties->paginate(15)]);
    }

    public function singlePropertyView($propertyID){
        $property = Property::findorFail($propertyID);
        return view('administration.pages.property.single',compact('property'));
    }

    public function addPropertyView(){
        return view('administration.pages.property.add');
    }
}
