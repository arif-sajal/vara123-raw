<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    public function manufacturer(){
        return $this->belongsTo(VehicleManufacturer::class);
    }

    public function vehicle_type(){
        return $this->belongsTo(VehicleType::class);
    }
}
