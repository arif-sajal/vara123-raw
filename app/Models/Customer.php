<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $appends = [
        'full_name'
    ];

    protected $fillable = [
        'token_created','token_expired_at','token'
    ];

    protected $casts = [
        'is_email_verified'=>'boolean',
        'is_phone_verified'=>'boolean',
    ];

    protected $hidden = [
        'password'
    ];

    public function getFullNameAttribute(){
        return $this->attributes['first_name']." ".$this->attributes['last_name'];
    }
}
