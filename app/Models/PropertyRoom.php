<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PropertyRoom extends Model
{
    public function property(){
        return $this->belongsTo(Property::class);
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    public function beds(){
        return $this->hasMany(RoomBed::class,'room_id');
    }

    public function billings(){
        return $this->morphMany(Billing::class,'item');
    }

    public static function boot(){

        parent::boot(); // TODO: Change the autogenerated stub

        static::deleting(function($room){
            if (Storage::has($room->featured_image)):
                Storage::delete($room->featured_image);
            endif;

            $room->beds()->each(function ($bed){
                $bed->delete();
            });

            $room->billings()->each(function ($billing){
                $billing->delete();
            });
        });
    }
}
