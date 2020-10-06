<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Customer\Auth\ForgotPassword;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Library\Api\Facades\Api;

class ForgotPasswordController extends Controller
{
    public function requestResetCustomer(Request $request){
        $validator = Validator::make($request->all(),[
            'username' => 'required'
        ]);

        if($validator->fails()):
            return Api::errors($validator->errors())->message('Invalid Data')->statusCode(406)->send();
        endif;

        $customer = Customer::where('username',$request->get('username'))->orWhere('email',$request->get('username'))->first();

        if(!$customer):
            return Api::message('User Not Found')->statusCode(404)->send();
        endif;

        //$customer->password_reset_token = encrypt($customer->username,true);
        $customer->password_reset_token = 12345678910;

        if($customer->save()):
            Mail::to($customer->email)->send(new ForgotPassword($customer->refresh()));
            return Api::message('Password Resetting Link Was Sent To Your Email.')->statusCode(200)->send();
        endif;
    }
}
