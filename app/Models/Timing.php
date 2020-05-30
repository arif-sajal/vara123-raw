<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    protected $dates = [
        'opening', 'closing'
    ];
}
