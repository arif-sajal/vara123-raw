<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PropertySpotResource extends JsonResource
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
            'provider'=> new ProviderResource($this->provider),
            'total'=> $this->total,
            'available'=> $this->available,
            'booked'=> $this->booked,
            'name'=> $this->name,
            'description'=> $this->description,
            'featuredImage'=> Storage::has($this->featured_image) ? Storage::url($this->featured_image) : Storage::url('system/no-image.jpg'),
            'compatibleVehicles'=> VehicleModelResource::collection($this->compatible_vehicles),
            'billings'=> BillingResource::collection($this->billings)
        ];
    }
}
