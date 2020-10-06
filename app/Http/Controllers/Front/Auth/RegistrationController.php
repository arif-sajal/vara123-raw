<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\CustomerResource;
use App\Models\Customer;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Library\Api\Facades\Api;

class RegistrationController extends Controller
{
    public function registerCustomer(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'nullable|unique:customers,phone',
            'username' => 'required|unique:customers,username',
            'password' => 'required|confirmed',
        ]);

        if($validator->fails()):
            return Api::errors($validator->errors())->message('Invalid Data')->statusCode(406)->send();
        endif;

        $customer = new Customer();

        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->username = $request->username;
        $customer->password = Hash::make($request->password);

        if($customer->save()):
            return Api::message('Registration Completed Successfully')->data(CustomerResource::make($customer->refresh()))->send();
        endif;

        return Api::message('Can\'t Register Now, Please Try Again.')->statusCode(400)->send();
    }

    public function registerProvider(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:providers,email',
            'phone' => 'nullable',
            'username' => 'required|unique:providers,username',
            'password' => 'required|confirmed',
        ]);

        if($validator->fails()):
            return Api::errors($validator->errors())->message('Invalid Data')->statusCode(406)->send();
        endif;

        $provider = new Provider();

        $provider->first_name = $request->first_name;
        $provider->last_name = $request->last_name;
        $provider->email = $request->email;
        $provider->phone = $request->phone;
        $provider->username = $request->username;
        $provider->password = Hash::make($request->password);

        if($provider->save()):
            return Api::message('Registration Completed Successfully')->data($provider->refresh())->send();
        endif;

        return Api::message('Can\'t Register Now, Please Try Again.')->statusCode(400)->send();
    }
}
