<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    public function provider(){
        return $this->belongsTo(Provider::class,'provider_id','id');
    }
}
