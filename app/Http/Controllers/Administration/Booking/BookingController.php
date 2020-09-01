<?php

namespace App\Http\Controllers\Administration\Booking;

use App\Http\Controllers\Controller;
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

    public function allBooking()
    {
      $booking = Booking::latest()->get();

      return DataTables::make($booking)

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


      public function singleBookingView($id)
      {

      }

      public function deleteBooking($id)
      {

      }

}
