<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    public function property_type(){
        return $this->belongsTo(PropertyType::class);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
}
