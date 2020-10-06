<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProviderResource extends JsonResource
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
            'firstName'=> $this->first_name,
            'lastName'=> $this->last_name,
            'fullName'=> $this->first_name.' '.$this->last_name,
            'gender'=> $this->gender,
            'dateOfBirth'=> $this->date_of_birth,
            'avatar'=> Storage::has($this->avatar) ? Storage::url($this->avatar) : Storage::url('system/default-provider-avatar.png'),
        ];
    }
}
