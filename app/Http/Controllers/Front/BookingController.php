<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\BookingResource;
use App\Models\Billing;
use App\Models\Booking;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Library\Api\Facades\Api;

class BookingController extends Controller
{
    private $customer;

    public function __construct(){
        $this->middleware('config');
        $this->middleware('converter');
    }

    public function getBookings(Request $request){
        $this->__set_customer__();
        $bookings = Booking::where('customer_id',$this->customer->id);

        return Api::data(BookingResource::collection($bookings->paginate()))->send();
    }

    public function bookNow(Request $request){
        $this->__set_customer__();

        $validator = Validator::make($request->all(),[
            'billing_id' => 'required|exists:billings,id',
            'date' => 'required',
            'time' => 'nullable|array',
            'note'=> 'nullable'
        ]);

        if($validator->fails()):
            return Api::errors($validator->errors())->statusCode(406)->message('Invalid Data')->send();
        endif;

        $billing = Billing::find($request->get('billing_id'));
        $booking = new Booking();

        if(is_array($request->get('date'))):
            $fromDate = Carbon::createFromTimeString($request->get('date')[0]);
            $toDate = Carbon::createFromTimeString($request->get('date')[1]);
        else:
            $fromDate = Carbon::createFromTimeString($request->get('date'));
            $toDate = Carbon::createFromTimeString($request->get('date'));
        endif;

        if(is_array($request->get('time')) && count($request->get('time'))):
            $fromTime = Carbon::createFromTimeString($request->get('time')[0]);
            $toTime = Carbon::createFromTimeString($request->get('time')[1]);
        else:
            $fromTime = null;
            $toTime = null;
        endif;

        if($billing->billing_type->per === 'Hour'):
            $ft = Carbon::createFromTimeString($fromTime);
            $tt = Carbon::createFromTimeString($toTime);
            $quantity = $ft->floatDiffInRealHours($tt);
        elseif($billing->billing_type->per === 'Day'):
            $fd = Carbon::createFromTimeString($fromDate);
            $td = Carbon::createFromTimeString($toDate);
            $quantity = $fd->floatDiffInRealDays($td);
        endif;

        if(!$quantity):
            return Api::message('Invalid Date Or Time Selected')->statusCode(403)->send();
        endif;

        $booking->customer_id = $this->customer->id;
        $booking->provider_id = $billing->property_id;
        $booking->property_id = $billing->property_id;
        $booking->item_id = $billing->item_id;
        $booking->item_type = $billing->item_type;
        $booking->billing_id = $billing->id;

        $booking->from_date = $fromDate;
        $booking->to_date = $toDate;

        $booking->from_time = $fromTime;
        $booking->to_time = $toTime;

        $booking->cost_per_unit = $billing->amount;
        $booking->quantity = $quantity;
        $booking->cost_total = $billing->amount * $quantity;
        $booking->currency_id = $billing->currency_id;
        $booking->is_payment_done = false;
        $booking->note = $request->get('note');

        if($booking->save()):
            return Api::data($booking->refresh())->message('Booked Successfully. Now Pay The Invoice To Confirm It.')->send();
        endif;
        return Api::message('Can\'t Book Now, Please Try Again Later.')->statusCode(403)->send();
    }

    public function getSingleBooking(Request $request,$bookingID){
        $booking = Booking::find($bookingID);

        if($booking):
            return Api::data(new BookingResource($booking))->send();
        endif;

        return Api::message('No Booking Found.')->statusCode(404)->send();
    }

    private function __set_customer__(){
        $session = session()->get('__api_session__');
        $this->customer = Customer::find($session->user_id);
    }
}
