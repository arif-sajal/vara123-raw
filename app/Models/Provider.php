<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Provider extends Authenticatable
{
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
}
