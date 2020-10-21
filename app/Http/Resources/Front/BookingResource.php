<?php

namespace App\Http\Resources\Front;

use App\Models\PropertyRoom;
use App\Models\PropertySpot;
use App\Models\PropertyVehicle;
use Cartalyst\Converter\Laravel\Facades\Converter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
            'customer'=> $this->when($request->get('get') === 'all',function(){
                return new CustomerResource($this->customer);
            }),
            'provider'=> new ProviderResource($this->provider),
            'property'=> new PropertyResource($this->property),
            'item'=> new PropertyItemResource($this->item, $this->item_type),
            'billing'=> new BillingResource($this->billing),
            'fromDate'=> $this->from_date,
            'toDate'=> $this->to_date,
            'fromTime'=> $this->from_time,
            'toTime'=> $this->to_time,
            'costPerUnit'=> [
                'original'=> $this->cost_per_unit,
                'converted'=> $this->getConvertedCostPerUnit($request),
                'formatted'=> $this->getConvertedCostPerUnit($request, true)
            ],
            'quantity'=> $this->quantity,
            'costTotal'=> [
                'original'=> $this->cost_total,
                'converted'=> $this->getConvertedCostTotal($request),
                'formatted'=> $this->getConvertedCostTotal($request, true)
            ],
            'currency'=> new CurrencyResource($this->currency),
            'transaction'=> $this->when($request->has('transaction'),function(){
                return BookingTransactionResource::collection($this->transactions);
            }),
            'isPaymentDone'=> $this->is_payment_done,
            'note'=> $this->note,
            'billingAddress'=> new BookingAddressResource($this->address),
            'createdAt'=> $this->created_at
        ];
    }

    private function getConvertedCostPerUnit(Request $request,$format = false){
        if($request->has('currency')):
            $converted = Converter::from('currency.'.strtolower($this->currency->short_code))->to('currency.'.strtolower($request->get('currency')))->convert($this->cost_per_unit);
        else:
            $converted = Converter::from('currency.'.strtolower($this->currency->short_code))->to('currency.'.strtolower(config('default_currency')->short_code))->convert($this->cost_per_unit);
        endif;

        if($format):
            return $converted->format();
        else:
            return $converted->getValue();
        endif;
    }

    private function getConvertedCostTotal(Request $request,$format = false){
        if($request->has('currency')):
            $converted = Converter::from('currency.'.strtolower($this->currency->short_code))->to('currency.'.strtolower($request->get('currency')))->convert($this->cost_total);
        else:
            $converted = Converter::from('currency.'.strtolower($this->currency->short_code))->to('currency.'.strtolower(config('default_currency')->short_code))->convert($this->cost_total);
        endif;

        if($format):
            return $converted->format();
        else:
            return $converted->getValue();
        endif;
    }
}
