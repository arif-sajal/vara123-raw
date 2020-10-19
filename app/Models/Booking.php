<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $dates = [
        'from_date','from_time','to_date','to_time'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    public function billing(){
        return $this->belongsTo(Billing::class);
    }

    public function item(){
        return $this->morphTo('item');
    }

    public function property(){
        return $this->belongsTo(Property::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function address(){
        return $this->hasOne(BookingAddress::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
