<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PropertyVehicleResource extends JsonResource
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
            'model'=> new VehicleModelResource($this->model),
            'total'=> $this->total,
            'available'=> $this->available,
            'booked'=> $this->booked,
            'name'=> $this->name,
            'description'=> $this->description,
            'featuredImage'=> Storage::has($this->featured_image) ? Storage::url($this->featured_image) : Storage::url('system/no-image-found.png'),
            'billings'=> BillingResource::collection($this->billings)
        ];
    }
}
