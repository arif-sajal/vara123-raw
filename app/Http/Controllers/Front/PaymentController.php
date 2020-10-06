<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\BookingTransactionResource;
use App\Models\Booking;
use App\Models\BookingTransaction;
use App\Models\Customer;
use App\Models\PaymentMethod;
use Cartalyst\Converter\Laravel\Facades\Converter;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Library\Api\Facades\Api;

class PaymentController extends Controller
{
    private $customer;

    public function __construct(){
        $this->middleware('config');
        $this->middleware('converter');
    }

    public function payNow(Request $request, $bookingId, $methodID){
        $paymentMethod = PaymentMethod::find($methodID);

        if(!$paymentMethod):
            return Api::message('No Valid Payment Method Selected.');
        endif;

        if($paymentMethod->identity === 'sslcommerz'):
            return $this->payWithSslCommerz($bookingId,$methodID);
        elseif($paymentMethod->identity === 'on_spot'):
            return $this->payOnSpot($bookingId,$methodID);
        endif;
    }

    /**
     * @param $bookingId
     * @param $methodID
     * @return \Library\Api\Api
     */
    public function payWithSslCommerz($bookingId,$methodID){
        $this->__set_customer__();
        $booking = Booking::find($bookingId);

        if(!$booking):
            return Api::message('Booking Not Found.')->statusCode(404)->send();
        endif;

        $transaction = BookingTransaction::where('booking_id',$bookingId)->first();

        if(!$transaction):
            $transaction = new BookingTransaction();
            $transaction->booking_id = $bookingId;
            $transaction->currency_id = $booking->currency_id;
            $transaction->payment_method_id = $methodID;
            $transaction->amount = $booking->cost_total;
            $transaction->save();
        endif;

        $postData = [
            'store_id'=> env('SSL_COMMERZ_STORE_ID'),
            'store_passwd'=> env('SSL_COMMERZ_STORE_PASS'),
            'total_amount'=> '500',
            'tran_id' => $transaction->refresh()->id,
            'currency' => 'BDT',
            'product_category' => 'Booking',
            'success_url' => url(env('SSL_COMMERZ_SUCCESSFUL_REDIRECT_URL')),
            'fail_url' => url(env('SSL_COMMERZ_FAILED_REDIRECT_URL')),
            'cancel_url' => url(env('SSL_COMMERZ_CANCELED_REDIRECT_URL')),
            'ipn_url' => url(env('SSL_COMMERZ_IPN_URL')),
            'emi_option' => 0,
            'cus_name' => $this->customer->first_name,
            'cus_email' => $this->customer->email,
            'cus_add1' => $this->customer->address,
            'cus_city' => $this->customer->city,
            'cus_state' => $this->customer->state,
            'cus_postcode' => $this->customer->post_code,
            'cus_country' => $this->customer->country,
            'cus_phone' => $this->customer->phone,
            'shipping_method' => 'NO',
            'num_of_item' => 1,
            'product_name' => $booking->item->name,
            'product_profile' => 'non-physical-goods',
            'value_a' => $bookingId
        ];

        $client = new Client();

        $response = $client->post('https://sandbox.sslcommerz.com/gwprocess/v4/api.php',['form_params'=>$postData])->getBody();
        $response = json_decode($response->getContents());

        $transaction->payment_initiation_server_response = $response;
        $transaction->save();

        return Api::data(BookingTransactionResource::make($transaction->refresh()))->send();
    }

    public function sslcomemrzSuccess(Request $request){
        $transection = BookingTransaction::find($request->get('tran_id'));

        $transection->payment_validation_server_response = $request->all();
        $transection->status = 'SUCCESS';
        $transection->is_payment_done = true;
        $transection->paid_by = 'Online Payment';

        $transection->save();

        return redirect('http://localhost:4200/book-now/'.$request->get('value_a').'?step=3&tran='.$request->get('tran_id').'&status='.$transection->payment_validation_server_response->status);
    }

    public function sslcomemrzFailed(Request $request){
        $transection = BookingTransaction::find($request->get('tran_id'));

        $transection->payment_validation_server_response = $request->all();
        $transection->status = 'FAILED';
        $transection->is_payment_done = false;
        $transection->paid_by = 'Online Payment';

        $transection->save();

        return redirect('http://localhost:4200/book-now/'.$request->get('value_a').'?step=3&tran='.$request->get('tran_id').'&status='.$transection->payment_validation_server_response->status);
    }

    public function sslcomemrzCanceled(Request $request){
        $transection = BookingTransaction::find($request->get('tran_id'));

        $transection->payment_validation_server_response = $request->all();
        $transection->status = 'CANCELED';
        $transection->is_payment_done = false;
        $transection->paid_by = 'Online Payment';

        $transection->save();

        return redirect('http://localhost:4200/book-now/'.$request->get('value_a').'?step=3&tran='.$request->get('tran_id').'&status='.$transection->payment_validation_server_response->status);
    }

    public function sslcomemrzIpnValidation(Request $request){
        $transection = BookingTransaction::find($request->get('tran_id'));

        $transection->payment_validation_server_response = $request->all();

        $transection->save();

        return $request->all();
    }

    public function payOnSpot($bookingId,$methodID){
        $this->__set_customer__();
        $booking = Booking::find($bookingId);

        if(!$booking):
            return Api::message('Booking Not Found.')->statusCode(404)->send();
        endif;

        $transaction = BookingTransaction::where('booking_id',$bookingId)->first();

        if(!$transaction):
            $transaction = new BookingTransaction();
        endif;

        $transaction->booking_id = $bookingId;
        $transaction->currency_id = $booking->currency_id;
        $transaction->payment_method_id = $methodID;
        $transaction->amount = $booking->cost_total;
        $transaction->status = 'PENDING';
        $transaction->is_payment_done = false;
        $transaction->paid_by = null;
        $transaction->save();

        return Api::data(BookingTransactionResource::make($transaction->refresh()))->send();
    }

    public function getPaymentMethods(Request $request){
        $paymentMethods = PaymentMethod::query();
        return Api::data($paymentMethods->get())->send();
    }

    public function getTransaction(Request $request,$transactionID){
        $this->__set_customer__();
        $transaction = BookingTransaction::find($transactionID);

        if(!$transaction):
            return Api::message('No Transaction Found.')->statusCode(404)->send();
        endif;

        if(!$transaction->booking->customer->is($this->customer)):
            return Api::message('The Transaction Is Not Belong From You.');
        endif;

        return Api::data(new BookingTransactionResource($transaction))->send();
    }


    /**
     * @param Booking $booking
     * @return Converter
     */
    private function get_booking_converted_total(Booking $booking){
        $converted = Converter::from('currency.'.strtolower($booking->currency->short_code))->to('currency.bdt')->convert($booking->cost_total);
        return $converted->getValue();
    }

    private function __set_customer__(){
        $session = session()->get('__api_session__');
        $this->customer = Customer::find($session->user_id);
    }
}
