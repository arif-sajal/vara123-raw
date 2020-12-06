<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PropertyTypeResource extends JsonResource
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
            'identity'=> $this->identity,
            'featuredImage'=> Storage::has($this->featured_image) ? Storage::url($this->featured_image) : Storage::url('system/no-image.jpg'),
            'propertyFeaturedImageNotFound'=> Storage::has($this->property_featured_image_not_found) ? Storage::url($this->property_featured_image_not_found) : Storage::url('system/no-image.jpg'),
            'title'=> $this->title,
            'subtitle'=> $this->subtitle,
            'icon'=> $this->icon,
        ];
    }
}
