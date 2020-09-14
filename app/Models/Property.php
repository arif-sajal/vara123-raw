<?php

namespace App\Models;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Property extends Model
{
    use SpatialTrait;

    protected $casts = [
        'verified' => 'boolean',
        'status' => 'boolean'
    ];

    protected $spatialFields = [
        'point',
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function vehicles(){
        return $this->hasMany(PropertyVehicle::class);
    }

    public function rooms(){
        return $this->hasMany(PropertyRoom::class);
    }

    public function spots(){
        return $this->hasMany(PropertySpot::class);
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    public function property_type(){
        return $this->belongsTo(PropertyType::class);
    }

    public function timings(){
        return $this->hasMany(Timing::class);
    }

    public function amenities(){
        return $this->hasManyThrough(Amenity::class,PropertyAmenity::class,'property_id','id','id','amenity_id');
    }

    public function property_amenities(){
        return $this->hasMany(PropertyAmenity::class);
    }

    public function billings(){
        return $this->hasMany(Billing::class);
    }

    public function gallery(){
        return $this->hasMany(Gallery::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function bookmarks(){
        return $this->hasMany(Bookmark::class);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function($property){
            /*for($i=1;$i<=7;$i++):
                $timings[] = [
                    'property_id' => $property->id,
                    'day_name' => now()->subDays($i)->format('D'),
                    'day_number' => now()->subDays($i)->dayOfWeek,
                    'opening' => now()->format('H:i:s'),
                    'closing' => now()->addHour(8)->format('H:i:s'),
                ];
            endfor;

            $property->timings()->insert($timings);*/
        });

        static::deleting(function($property){

            if(Storage::has($property->featured_image)):
                Storage::delete($property->featured_image);
            endif;

            $property->property_amenities()->each(function($amenity){
                $amenity->delete();
            });

            $property->timings()->each(function($time){
                $time->delete();
            });

            $property->reviews()->each(function($review){
                $review->delete();
            });

            $property->gallery()->each(function($gallery){
                $gallery->delete();
            });

            $property->billings()->each(function($billing){
                $billing->delete();
            });

            $property->rooms()->each(function($room){
                $room->delete();
            });

            $property->spots()->each(function($spot){
                $spot->delete();
            });

            $property->vehicles()->each(function($vehicles){
                $vehicles->delete();
            });
        });
    }
}
