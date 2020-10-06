<?php

namespace App\Http\Resources\Front;

use App\Models\Bookmark;
use App\Models\Customer;
use Cartalyst\Converter\Laravel\Facades\Converter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'slug'=> $this->slug,
            'name'=> $this->name,
            'phone'=> $this->phone,
            'email'=> $this->email,
            'description'=> $this->description,
            'address'=> $this->address,
            'lat'=> floatval($this->lat),
            'lng'=> floatval($this->lng),
            'featuredImage'=> Storage::has($this->featured_image) ? Storage::url($this->featured_image) : Storage::url($this->property_type->property_featured_image_not_found),
            'currency'=> new CurrencyResource($this->currency),
            'provider'=> new ProviderResource($this->provider),
            'propertyType'=> new PropertyTypeResource($this->property_type),
            'amenities'=> AmenityResource::collection($this->amenities),
            'marker'=> Storage::has($this->property_type->marker) ? Storage::url($this->property_type->marker) : Storage::url('system/default-marker.png'),
            'roomsAvailable'=> $this->when($this->rooms()->exists(),function(){return $this->rooms()->sum('available');}),
            'spotsAvailable'=> $this->when($this->spots()->exists(),function(){return $this->spots()->sum('available');}),
            'vehiclesAvailable'=> $this->when($this->vehicles()->exists(),function(){return $this->vehicles()->sum('available');}),
            'timings'=> $this->when($request->has('get') && $request->get('get') === 'all',function(){
                return TimingResource::collection($this->timings);
            }),
            'rooms'=> $this->when($request->has('get') && $request->get('get') === 'all',function(){
                return PropertyRoomResource::collection($this->rooms);
            }),
            'vehicles'=> $this->when($request->has('get') && $request->get('get') === 'all',function(){
                return PropertyVehicleResource::collection($this->vehicles);
            }),
            'spots'=> $this->when($request->has('get') && $request->get('get') === 'all',function(){
                return PropertySpotResource::collection($this->spots);
            }),
            'gallery'=> $this->when($request->has('get') && $request->get('get') === 'all',function(){
                return GalleryResource::collection($this->gallery);
            }),
            'reviews'=> [
                    'count'=> $this->reviews()->count(),
                    'avg'=> number_format($this->reviews()->avg('average'),1),
                    'qualityAvg'=> number_format($this->reviews()->avg('quality'),1),
                    'locationAvg'=> number_format($this->reviews()->avg('location'),1),
                    'priceAvg'=> number_format($this->reviews()->avg('price'),1),
                    'serviceAvg'=> number_format($this->reviews()->avg('service'),1),
                    'data'=> $this->when($request->has('get') && $request->get('get') === 'all', function(){
                        return ReviewResource::collection($this->reviews);
                    })
                ],
            'isAlwaysOpen'=> $this->is_always_open,
            'pricing'=> $this->when($this->billings()->exists(),function() use($request){
                return [
                    'min'=> [
                        'original'=> $this->billings()->min('amount'),
                        'originalFormatted'=> Converter::to('currency.'.strtolower($this->currency->short_code))->value($this->billings()->min('amount'))->format(),
                        'converted'=> $this->convertedMinPrice($request),
                        'convertedFormatted'=> $this->convertedMinPrice($request,true)
                    ],
                    'max'=> [
                        'original'=> $this->billings()->max('amount'),
                        'originalFormatted'=> Converter::to('currency.'.strtolower($this->currency->short_code))->value($this->billings()->max('amount'))->format(),
                        'converted'=> $this->convertedMaxPrice($request),
                        'convertedFormatted'=> $this->convertedMaxPrice($request,true)
                    ],
                ];
            }),
            'isOpen' => $this->is_always_open ? true:
                $this->timings()->where('opening','<',now()->toTimeString())
                    ->where('closing','>',now()->toTimeString())
                    ->where('day_number',now()->dayOfWeek)->exists(),
            'verified' => $this->verified,
            'bookmarked' => $this->when($request->has('customerId'),function() use($request){
                $customer = Customer::find($request->get('customerId'));
                if($customer):
                    return $this->bookmarks()->where('property_id',$this->id)->exists();
                endif;
                return false;
            }),
            'viewed' => $this->viewed,
            'bookmarkCount' => $this->bookmarks()->count(),
        ];
    }

    protected function convertedMinPrice(Request $request,$format=false){
        if($request->has('currency')):
            $converted = Converter::from('currency.'.strtolower($this->currency->short_code))->to('currency.'.strtolower($request->get('currency')))->convert($this->billings()->min('amount'));
        else:
            $converted = Converter::from('currency.'.strtolower($this->currency->short_code))->to('currency.'.strtolower(config('default_currency')->short_code))->convert($this->billings()->min('amount'));
        endif;

        if($format):
            return $converted->format();
        else:
            return $converted->getValue();
        endif;
    }

    protected function convertedMaxPrice(Request $request,$format=false){
        if($request->has('currency')):
            $converted = Converter::from('currency.'.strtolower($this->currency->short_code))->to('currency.'.strtolower($request->get('currency')))->convert($this->billings()->max('amount'));
        else:
            $converted = Converter::from('currency.'.strtolower($this->currency->short_code))->to('currency.'.strtolower(config('default_currency')->short_code))->convert($this->billings()->max('amount'));
        endif;

        if($format):
            return $converted->format();
        else:
            return $converted->getValue();
        endif;
    }
}
