<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PropertyRoomResource extends JsonResource
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
            'description'=> $this->description,
            'forPerson'=> $this->for_person,
            'bedCount'=> $this->bed_count,
            'roomType'=> $this->room_type,
            'total'=> $this->total,
            'available'=> $this->available,
            'booked'=> $this->booked,
            'featuredImage'=> Storage::has($this->featured_image) ? Storage::url($this->featured_image) : Storage::url('system/no-image.jpg'),
            'billings'=> BillingResource::collection($this->billings),
        ];
    }
}
