<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PropertySpot extends Model
{
    public function property(){
        return $this->belongsTo(Property::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function billings(){
        return $this->morphMany(Billing::class,'item');
    }

    public function compatible_vehicles(){
        return $this->hasMany(CompatibleSpotVehicle::class,'property_spot_id');
    }

    public function compatible_vehicles_types(){
        return $this->hasManyThrough(VehicleType::class,CompatibleSpotVehicle::class,'property_spot_id','id','id','vehicle_type_id');
    }

    public static function boot(){

        parent::boot(); // TODO: Change the autogenerated stub

        static::deleting(function($spot){

            if(Storage::has($spot->featured_image)):
                Storage::delete($spot->featured_image);
            endif;

            $spot->billings()->each(function($billing){
                $billing->delete();
            });

            $spot->compatible_vehicles()->each(function($cv){
                $cv->delete();
            });

        });
    }
}
