<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PropertyVehicle extends Model
{
    public function model(){
        return $this->belongsTo(VehicleModel::class,'vehicle_model_id','id');
    }

    public function manufacturer(){
        return $this->belongsTo(VehicleManufacturer::class,'vehicle_manufacturer_id','id');
    }

    public function property(){
        return $this->belongsTo(Property::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function billings(){
        return $this->hasMany(Billing::class,'item_id','id');
    }

    public static function boot(){

        parent::boot(); // TODO: Change the autogenerated stub

        static::deleting(function($vehicle){

            if (Storage::has($vehicle->featured_image)):
                Storage::delete($vehicle->featured_image);
            endif;

            $vehicle->billings()->each(function ($billing){
                $billing->delete();
            });
        });
    }
}
