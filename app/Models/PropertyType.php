<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PropertyType extends Model
{
    protected $appends = [
        'full_featured_image_url'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    public function getFullFeaturedImageUrlAttribute(){
        if(Storage::has($this->attributes['featured_image'])):
            return Storage::url($this->attributes['featured_image']);
        else:
            return Storage::url($this->attributes['property_featured_image_not_found']);
        endif;
    }
}
