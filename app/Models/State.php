<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $hidden = [
        'country_id','country_name','created_at','updated_at'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
