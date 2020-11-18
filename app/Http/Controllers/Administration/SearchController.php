<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\Search;
use App\Models\Property;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    
    public function search($item){
        if( auth('provider')->check() ):
            $property = Property::orWhere('name','LIKE',"%$item%")->where('provider_id',auth('provider')->user()->id)->get();
            return response()->json(['property'=>Search::collection($property)]);
        endif;
        $property = Property::orWhere('name','LIKE',"%$item%")->get();
        return response()->json(['property'=>Search::collection($property)]);
    }

    public function searchPropertyType($item, $id){
        if( auth('provider')->check() ):
            return 1;
            $property = Property::orWhere('name','LIKE',"%$item%")->where('provider_id',auth('provider')->user()->id)->where('property_type_id',$id)->get();
            return response()->json(['property'=>Search::collection($property)]);
        endif;
        $property = Property::orWhere('name','LIKE',"%$item%")->where('property_type_id',$id)->get();
        return response()->json(['property'=>Search::collection($property)]);
    }
}
