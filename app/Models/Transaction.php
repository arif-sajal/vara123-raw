<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function booking(){
        return $this->belongsTo(Booking::class);
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }
}
