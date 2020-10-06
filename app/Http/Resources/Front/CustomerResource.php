<?php

namespace App\Http\Resources\Front;

use App\Models\Customer;
use App\Models\Verification;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'firstName'=> $this->first_name,
            'lastName'=> $this->last_name,
            'fullName'=> $this->first_name.' '.$this->last_name,
            'email'=> $this->email,
            'isEmailVerified'=> $this->is_email_verified,
            'aboutToVerifyEmail'=> $this->when(!$this->is_email_verified,function(){
                return Verification::where(['user_id'=>$this->id,'user_type'=>Customer::class,'type'=>'email'])->exists();
            }),
            'phone'=> $this->phone,
            'isPhoneVerified'=> $this->is_phone_verified,
            'aboutToVerifyPhone'=> $this->when(!$this->is_phone_verified,function(){
                return Verification::where(['user_id'=>$this->id,'user_type'=>Customer::class,'type'=>'phone'])->exists();
            }),
            'username'=> $this->username,
            'dateOfBirth'=> $this->date_of_birth,
            'gender'=> $this->gender,
            'nidNumber'=> $this->nid_number,
            'birthCertificateNumber'=> $this->birth_certificate_number,
            'passportNumber'=> $this->passport_number,
            'emergencyContactNumber'=> $this->emergency_contact_number,
            'avatar'=> Storage::has($this->avatar) ? Storage::url($this->avatar) : Storage::url('system/default-provider-avatar.png'),
        ];
    }
}
