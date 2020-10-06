<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Cartalyst\Converter\Laravel\Facades\Converter;
use Illuminate\Http\Request;
use App\Models\Booking;
use Library\Notify\Facades\Notify;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
    public function bookingListView()
    {
         return view('administration.pages.booking.list');
    }

    public function bookingsTable(){
        $booking = Booking::with(['property','property.property_type','provider','item','currency']);

        if(auth('provider')->check()):
            $booking->where('provider_id',auth('provider')->id())->latest()->get();
        endif;

        return DataTables::make($booking->latest()->get())
            ->editColumn('is_payment_done',function(Booking $booking){
                return $booking->is_payment_done ? 'Paid' : "Unpaid";
            })
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

    public function singleBookingView($id){
        $booking = Booking::findOrFail($id);
        return view('administration.pages.booking.single',compact('booking'));
    }

    public function deleteBooking($id){

    }

}
