<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'token_created','token_expired_at','token'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
