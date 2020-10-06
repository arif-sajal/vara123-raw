<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\CustomerResource;
use App\Mail\Front\CustomerProfile\RequestEmailVerification;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Review;
use App\Models\Verification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Library\Api\Facades\Api;
use Library\Sms\Facades\Sms;

class CustomerProfileController extends Controller
{

    public $customer;

    public function getProfile(Request $request){
        $this->__set_customer__();
        return Api::data(new CustomerResource($this->customer))->send();
    }

    public function requestEmailVerification(Request $request){
        $this->__set_customer__();

        if($this->customer->is_email_verified):
            return Api::message('Email Already Verified.')->send();
        endif;

        $oldVerification = Verification::where('user_id',$this->customer->id)->where('user_type',Customer::class)->where('type','email');

        if($oldVerification->exists()):
            $oldVerification->delete();
        endif;

        $verificationCode = /*Str::random(6)*/123456;

        $verification = new Verification();
        $verification->user_id = $this->customer->id;
        $verification->user_type = Customer::class;
        $verification->type = 'email';
        $verification->code = $verificationCode;

        if($verification->save()):
            Mail::to($this->customer)->send(new RequestEmailVerification($this->customer, $verification));
            return Api::message('We Sent a Verification Code in You Mail.')->data(new CustomerResource($this->customer->refresh()))->send();
        endif;
        return Api::message('Can\'t Send Verification Code Now, Please Try Again Later.')->data(new CustomerResource($this->customer->refresh()))->statusCode(400)->send();
    }

    public function verifyEmail(Request $request){
        $this->__set_customer__();
        $validator = Validator::make($request->all(), [
            'code' => 'required',
        ]);

        if ($validator->fails()):
            return Api::errors($validator->errors())->statusCode(406)->message('Invalid Data')->send();
        endif;

        $verification = Verification::where('user_id',$this->customer->id)->where('user_type',Customer::class)->where('type','email')->first();

        if($verification):
            if($request->get('code') === $verification->code):
                $this->customer->is_email_verified = true;
                if($this->customer->save() and $verification->delete()):
                    return Api::message('Email Verified Successfully')->data(new CustomerResource($this->customer->refresh()))->send();
                endif;
                return Api::message('Can\'t Verify Email Now, Please Try Again Later.')->statusCode(403)->send();
            endif;
            return Api::message('Invalid Verification Code')->statusCode(403)->send();
        endif;
        return Api::message('Email Verification is Not Requested.')->statusCode(400)->send();
    }

    public function requestPhoneVerification(Request $request){
        $this->__set_customer__();

        if(!$this->customer->phone):
            return Api::message('No Phone Number Associated With Your Profile.')->send();
        endif;

        if($this->customer->is_phone_verified):
            return Api::message('Phone Already Verified.')->send();
        endif;

        $oldVerification = Verification::where('user_id',$this->customer->id)->where('user_type',Customer::class)->where('type','phone');

        if($oldVerification->exists()):
            $oldVerification->delete();
        endif;

        $verificationCode = rand(1111,9999);

        $verification = new Verification();
        $verification->user_id = $this->customer->id;
        $verification->user_type = Customer::class;
        $verification->type = 'phone';
        $verification->code = $verificationCode;

        if($verification->save()):
            Sms::message(sprintf('Your Phone Number Verification Code Is %u',$verificationCode))->to($this->customer->phone)->send();
            return Api::message('A Verification Code Sent To You Phone Number.')->data(new CustomerResource($this->customer->refresh()))->statusCode(200)->send();
        endif;
        return Api::message('No Phone Number Belongs To You..')->statusCode(400)->send();
    }

    public function verifyPhone(Request $request){
        $this->__set_customer__();
        $validator = Validator::make($request->all(), [
            'code' => 'required',
        ]);

        if ($validator->fails()):
            return Api::errors($validator->errors())->statusCode(406)->message('Invalid Data')->send();
        endif;

        $verification = Verification::where('user_id',$this->customer->id)->where('user_type',Customer::class)->where('type','phone')->first();

        if($verification):
            if($request->get('code') === $verification->code):
                $this->customer->is_phone_verified = true;
                if($this->customer->save() and $verification->delete()):
                    return Api::message('Phone Verified Successfully')->data(new CustomerResource($this->customer->refresh()))->send();
                endif;
                return Api::message('Can\'t Verify Phone Now, Please Try Again Later.')->statusCode(403)->send();
            endif;
            return Api::message('Invalid Verification Code')->statusCode(403)->send();
        endif;
        return Api::message('Phone Verification is Not Requested.')->statusCode(400)->send();
    }

    public function changePassword(Request $request){
        $this->__set_customer__();
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed',
            'current_password'=> ['required',function($attribute, $value, $fail){
                if(!Hash::check($value, $this->customer->password)):
                    $fail($attribute.' Doesn\'t Match.');
                endif;
            }]
        ]);

        if ($validator->fails()):
            return Api::errors($validator->errors())->statusCode(406)->message('Invalid Data')->send();
        endif;

        $this->customer->password = Hash::make($request->password);

        if($this->customer->save()):
            return Api::message('Password Changed Successfully.')->send();
        endif;

        return Api::message('Can\'t Change Password Now, Please Try Again Later.')->statusCode(406)->send();
    }

    public function update(Request $request){
        $this->__set_customer__();
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => ['required', Rule::unique('customers','username')->ignore($this->customer->id)],
            'email' => ['required', Rule::unique('customers','email')->ignore($this->customer->id)],
            'phone' => ['required', Rule::unique('customers','phone')->ignore($this->customer->id)],
            'date_of_birth' => 'required',
            'gender' => 'required',
            'emergency_contact_number' => 'required',
        ]);

        if ($validator->fails()):
            return Api::errors($validator->errors())->statusCode(406)->message('Invalid Data')->send();
        endif;

        $this->customer->first_name = $request->get('first_name');
        $this->customer->last_name = $request->get('last_name');
        $birthDate = Carbon::createFromTimeString($request->get('date_of_birth'));
        $this->customer->date_of_birth = $birthDate;
        $this->customer->gender = $request->get('gender');

        if($this->customer->email !== $request->get('email')):
            $this->customer->is_email_verified = false;
        endif;
        $this->customer->email = $request->get('email');

        if($this->customer->phone !== $request->get('phone')):
            $this->customer->is_phone_verified = false;
        endif;
        $this->customer->phone = $request->get('phone');

        $this->customer->emergency_contact_number = $request->get('emergency_contact_number');

        if($this->customer->save()):
            return Api::message('Profile Updated Successfully.')->send();
        endif;

        return Api::message('Can\'t Update Profile Now, Please Try Again.')->send();
    }

    public function changeAvatar(Request $request){
        $this->__set_customer__();
        $validator = Validator::make($request->all(), [
            'avatar' => 'required|image',
        ]);

        if ($validator->fails()):
            return Api::errors($validator->errors())->statusCode(406)->message('Invalid Data')->send();
        endif;

        Storage::delete($this->customer->avatar);

        $this->customer->avatar = Storage::put('',$request->file('avatar'));

        if($this->customer->save()):
            return Api::message('Profile Picture Uploader Successfully.')->send();
        endif;

        return Api::message('Can\'t Upload Profile Picture Now, Please Try Again.')->send();
    }

    public function simpleReport(Request $request){
        $this->__set_customer__();

        $totalBookings = Booking::where('customer_id',$this->customer->id)->count();
        $totalReviews = Review::where('customer_id',$this->customer->id)->count();

        return Api::data([
            'totalBookings'=> $totalBookings,
            'totalReviews'=> $totalReviews
        ])->send();
    }

    private function __set_customer__(){
        $session = session()->get('__api_session__');
        $this->customer = Customer::find($session->user_id);
    }
}
