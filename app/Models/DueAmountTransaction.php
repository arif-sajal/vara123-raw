<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DueAmountTransaction extends Model
{
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
}
