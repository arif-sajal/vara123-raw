<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingTransactionResource extends JsonResource
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
            'booking'=> $this->when($request->get('booking'),function(){
                return new BookingResource($this->booking);
            }),
            'customer'=> $this->when($request->get('customer'), function (){
                return new CustomerResource($this->booking->customer);
            }),
            'currency'=> new CurrencyResource($this->currency),
            'paymentMethod'=> new PaymentMethodResource($this->payment_method),
            'amount'=> $this->amount,
            'paymentInitiationServerResponse' => $this->payment_initiation_server_response,
            'paymentValidationServerResponse'=> $this->payment_validation_server_response,
            'paidBy'=> $this->paid_by,
            'isPaymentDone'=> $this->is_payment_done,
            'createdAt'=> $this->created_at,
            'success_url' => url(env('SSL_COMMERZ_SUCCESSFUL_REDIRECT_URL')),
            'fail_url' => url(env('SSL_COMMERZ_FAILED_REDIRECT_URL')),
            'cancel_url' => url(env('SSL_COMMERZ_CANCELED_REDIRECT_URL')),
        ];
    }
}
