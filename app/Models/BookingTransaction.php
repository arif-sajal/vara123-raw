<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingTransaction extends Model
{
    protected $fillable = [
        'booking_id','payment_method_id'
    ];

    protected $casts = [
        'is_payment_done'=> 'boolean',
        'payment_initiation_server_response'=> 'object',
        'payment_validation_server_response'=> 'object'
    ];

    public function payment_method(){
        return $this->belongsTo(PaymentMethod::class);
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    public function booking(){
        return $this->belongsTo(Booking::class);
    }
}
