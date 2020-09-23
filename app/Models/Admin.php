<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $appends = [
        'full_name'
    ];

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'token_created','token_expired_at','token'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function getFullNameAttribute(){
        return $this->attributes['first_name']." ".$this->attributes['last_name'];
    }
}
