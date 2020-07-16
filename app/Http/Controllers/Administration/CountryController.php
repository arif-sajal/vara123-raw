<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function options(Request $request){
        $countries = Country::query();

        if($request->has('name')):
            $countries->where('name','LIKE',"%".$request->get('name')."%");
        endif;

        return response()->json($countries->get());
    }
}
