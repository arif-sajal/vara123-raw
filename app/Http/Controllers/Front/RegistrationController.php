<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Provider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function register(Request $request){
       
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:11|max:11',
            'password' => 'required|min:6',
            'user_type' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['errors'=> $validator->errors()], 422);
        } else{
            if( $request->user_type == 'provider' ):
                $provider = new Provider();
                $provider->first_name = $request->first_name;
                $provider->last_name = $request->last_name;
                $provider->email = $request->email;
                $provider->phone = $request->phone;
                $provider->password = Hash::make($request->password);
                if( $provider->save() ):
                    return response()->json(['provider'=>$provider], 200);
                endif;
            elseif( $request->user_type == 'customer' ):
                $customer = new Customer();
                $customer->first_name = $request->first_name;
                $customer->last_name = $request->last_name;
                $customer->email = $request->email;
                $customer->phone = $request->phone;
                $customer->password = Hash::make($request->password);
                if( $customer->save() ):
                    return response()->json(['customer'=>$customer],200);
                endif;
            endif;
        }
    }
}
