<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Provider extends Authenticatable
{
    protected $appends = [
        'full_name'
    ];

    protected $fillable = [
        'token_created','token_expired_at','token'
    ];

    protected $hidden =  [
        'password'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    public function getFullNameAttribute(){
        return $this->attributes['first_name']." ".$this->attributes['last_name'];
    }

    public function dueAmountTransaction(){
        return $this->hasMany(DueAmountTransaction::class);
    }

    public function amenity(){
        return $this->hasMany(Amenity::class);
    }

    public function property_vehicle(){
        return $this->hasMany(PropertyVehicle::class);
    }
    public function property_spot(){
        return $this->hasMany(PropertySpot::class);
    }
    public function property_room(){
        return $this->hasMany(PropertyRoom::class);
    }
    public function property(){
        return $this->hasMany(Property::class);
    }
    public function property_amenities(){
        return $this->hasMany(PropertyAmenity::class);
    }
    public function payout(){
        return $this->hasMany(Payout::class);
    }
    public function booking(){
        return $this->hasMany(Booking::class);
    }
}
