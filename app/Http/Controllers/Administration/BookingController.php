<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Booking\Confirm;
use Cartalyst\Converter\Laravel\Facades\Converter;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingTransaction;
use App\Models\Config;
use App\Models\Transaction;
use Carbon\Carbon;
use Library\Configs\Facades\Configs;
use Library\Notify\Facades\Notify;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Console\Scheduling\Schedule;
use Prophecy\Promise\ReturnPromise;

class BookingController extends Controller
{
    public function bookingListView()
    {
        return view('administration.pages.booking.list');
    }

    public function completePayment($id){
        $booking_transaction = BookingTransaction::find($id);
        $booking_transaction->is_payment_done = true;
        if( $booking_transaction->save() ):

            return Notify::send('success','Payment confirmed')->json();
        endif;
    }

    //booking completion for provider
    public function providerCompletion($id){
        $booking = Booking::find($id);
        $booking->provider_completion = true;
        if( $booking->save() ):
            if( $booking->provider_completion == true  && $booking->customer_completion == true ):
                $booking->provider->increment('balance',$booking->provider_cut);
                $booking->provider->decrement('pending_balance',$booking->provider_cut);
                return Notify::send('success','Booking Completion done')->json();
            else:
                return Notify::send('success','Booking Completion done')->json();
            endif;
        endif;
    }

    //booking completion for customer
    public function customerCompletion($id){
        $booking = Booking::find($id);
        $booking->customer_completion = true;
        if( $booking->save() ):
            if( $booking->provider_completion == true  && $booking->customer_completion == true ):
                $booking->provider->increment('balance',$booking->provider_cut);
                $booking->provider->decrement('pending_balance',$booking->provider_cut);
                return Notify::send('success','Booking Completion done')->json();
            else:
                return Notify::send('success','Booking Completion done')->json();
            endif;
        endif;
    }

    public function bookingConfirmationModal($id){
        $booking = Booking::find($id);
        $vat = Configs::get('default_customer_tax_rate') / 100;
        $total_price = Booking::find($id)->cost_total * $vat + Booking::find($id)->cost_total;

        $due_amount = Converter::from('currency.'.strtoupper($booking->currency->short_code))->to('currency.'.strtoupper($booking->provider->currency->short_code))->convert($total_price)->getValue();
        return view('administration.modals.booking.confirm', compact('due_amount','booking'));
    }

    public function confirmBooking(Confirm $request, $id){
        $booking = Booking::find($id);
        $booking->payment_type = $request->payment_type;
        $booking->payment_type = $request->payment_type;
        if( $booking->save() ){
            return Notify::send('success','Booking Confirmed Successfully')->json();
        }
    }

    public function singleBookingView($id){
        $booking = Booking::findOrFail($id);
        return view('administration.pages.booking.single')->with('booking', $booking);
    }

    public function bookingsTable(){
        $booking = Booking::with(['property','property.property_type','provider','item','currency']);

        if(auth('provider')->check()):
            $booking->where('provider_id',auth('provider')->id())->latest()->get();
        endif;

        return DataTables::make($booking->latest()->get())
            ->addColumn('booking_from',function(Booking $booking){
                return $booking->from_date->format('d M, Y') . ($booking->from_time && $booking->from_time != $booking->to_time ?  ' at '.$booking->from_time->format('h:m a') : '');
            })
            ->addColumn('booking_to',function(Booking $booking){
                return $booking->to_date->format('d M, Y') . ($booking->to_time && $booking->from_time != $booking->to_time ?  ' at '.$booking->to_time->format('h:m a') : '');
            })
            ->addColumn('provider_name',function(Booking $booking){
                return $booking->provider->first_name.' '.$booking->provider->last_name;
            })
            ->addColumn('property_name',function(Booking $booking){
                return $booking->property->name.' ( '.$booking->property->property_type->name.' )';
            })
            ->addColumn('total_price',function(Booking $booking){
                return Converter::to('currency.'.$booking->currency->short_code)->value($booking->cost_total)->format();
            })
            ->addColumn('action',function($booking){
                return "
                    <a class='btn btn-sm btn-primary' href='".route('app.booking.view',$booking->id)."
                    'data-hover='tooltip' data-original-title='View Booking'><i class='la la-eye'></i></a>

                    <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".
                    route('app.booking.delete',$booking->id)."' data-hover='tooltip'
                    data-original-title='Delete Room'><i class='la la-trash'></i></button>
                ";
            })
            ->toJson();
    }

    public function deleteBooking($id){

    }

}
