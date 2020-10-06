<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleModelResource extends JsonResource
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
            'manufacturer'=> new VehicleManufacturerResource($this->manufacturer),
            'type'=> new VehicleTypeResource($this->vehicle_type),
            'modelName'=> $this->model_name,
            'modelYear'=> $this->model_year,
            'height'=> $this->height,
            'width'=> $this->width,
            'length'=> $this->length,
            'mileage'=> $this->mileage,
            'transmission'=> $this->transmission,
            'fuelType'=> $this->fuel_type,
            'doorCount'=> $this->door_count,
            'image'=> $this->image
        ];
    }
}
