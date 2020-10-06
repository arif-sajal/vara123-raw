<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class VehicleManufacturerResource extends JsonResource
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
            'name'=> $this->name,
            'logo'=> Storage::has($this->logo) ? Storage::url($this->logo) : '',
            'country'=> new CountryResource($this->country)
        ];
    }
}
