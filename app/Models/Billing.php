<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $casts = [
        'active'=> 'boolean'
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }

    public function billing_type(){
        return $this->belongsTo(BillingType::class);
    }


    public function currency(){
        return $this->belongsTo(Currency::class);
    }
}
