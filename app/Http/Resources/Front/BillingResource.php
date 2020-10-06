<?php

namespace App\Http\Resources\Front;

use Cartalyst\Converter\Laravel\Facades\Converter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillingResource extends JsonResource
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
            'amount'=> [
                'original'=> $this->amount,
                'converted'=> $this->convertCurrency($request,false),
                'formatted'=> $this->convertCurrency($request,true),
            ],
            'currency'=> new CurrencyResource($this->currency),
            'billingType'=> new BillingTypeResource($this->billing_type),
        ];
    }

    private function convertCurrency(Request $request,$format=false){
        if($request->has('currency')):
            $converted = Converter::from('currency.'.strtolower($this->currency->short_code))->to('currency.'.strtolower($request->get('currency')))->convert($this->amount);
        else:
            $converted = Converter::from('currency.'.strtolower($this->currency->short_code))->to('currency.'.strtolower(config('default_currency')->short_code))->convert($this->amount);
        endif;

        if($format):
            return $converted->format();
        else:
            return $converted->getValue();
        endif;
    }
}
