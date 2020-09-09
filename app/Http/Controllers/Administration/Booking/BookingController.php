<?php

namespace App\Http\Controllers\Administration\Booking;

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

    public function allBooking(){
        $booking = Booking::with(['property','property.property_type','provider','item','currency'])->latest()->get();

        return DataTables::make($booking)
            ->editColumn('is_payment_done',function(Booking $booking){
                return $booking->is_poayment_done ? 'Paid' : "Unpaid";
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
                    <button class='btn btn-sm btn-primary'data-content='"
                    .route('admin.booking.view',$booking->id)."
                    'data-hover='tooltip' data-original-title='View Room'><i class='la la-eye'></i></button>

                    <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".
                    route('admin.booking.delete',$booking->id)."' data-hover='tooltip'
                    data-original-title='Delete Room'><i class='la la-trash'></i></button>
                ";
            })
            ->toJson();
    }

    public function singleBookingView($id){

    }

    public function deleteBooking($id){

    }
}
