<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Customer\Auth\PasswordResetSuccessfully;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Library\Api\Facades\Api;

class ResetPasswordController extends Controller
{
    public function resetNow(Request $request){
        $validator = Validator::make($request->all(),[
            'token'=> 'required',
            'password'=> 'required|confirmed'
        ]);

        if($validator->fails()):
            return Api::errors($validator->errors())->message('No Resetting Token Found')->statusCode(406)->send();
        endif;


        // Below Lines Will Be Uncommented in Production Server
        /*$token = null;

        try {
            $token = decrypt($request->get('token'), true);
        } catch (\Exception $error) {
            return Api::message('Invalid Token Sent')->statusCode(406)->send();
        }*/

        // Below Line Will Be Deleted On Production Server
        $token = $request->get('token');

        if($token):
            // Below Line Will Be deleted On Production Server
            $customer = Customer::where('password_reset_token',$token)->first();
            // Below line will be uncommented on production server
            //$customer = Customer::where('username',$token)->first();
            $customer->password_reset_token = null;
            $customer->password = Hash::make($request->get('password'));
            if($customer->save()):
                Mail::to($customer->email)->send(new PasswordResetSuccessfully($customer->refresh()));
                return Api::message('Password Reset Successfully')->send();
            endif;
            return Api::message('Can\'t Reset Password Now, Please Try Again Later.')->statusCode()->send();
        endif;
    }
}
