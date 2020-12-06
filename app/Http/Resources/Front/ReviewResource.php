<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'customer'=> new CustomerResource($this->customer),
            'quality'=> $this->quality,
            'location'=> $this->location,
            'price'=> $this->price,
            'service'=> $this->service,
            'avg'=> ($this->service + $this->price + $this->location + $this->quality) / 4,
            'review'=> $this->review,
            'createdAt'=> $this->created_at
        ];
    }
}
