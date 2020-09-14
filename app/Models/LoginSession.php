<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginSession extends Model
{
    protected $casts = [
        'is_desktop'=> 'boolean',
        'is_tablet'=> 'boolean',
        'is_mobile'=> 'boolean',
        'device'=> 'string',
    ];
}
