<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class Search extends JsonResource
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
            'id' => $this->id,
            'name'=> $this->name,
            'address' => $this->address,
            'image' =>  $this->featured_image ? Storage::url($this->featured_image)  : Storage::url($this->property_type->property_featured_image_not_found),
            'type' => $this->property_type->name,
            'desc' => $this->description,
            'view_route' => route('app.property.view',$this->id),
            'edit_route' => route('app.property.edit', $this->id),
            'delete_route' => route('app.property.delete.modal', $this->id)
        ];
    }
}
