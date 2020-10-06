<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingAddressResource extends JsonResource
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
            'country'=> $this->country,
            'state'=> $this->state,
            'city'=> $this->city,
            'street'=> $this->street,
            'postalCode'=> $this->postal_code
        ];
    }
}
