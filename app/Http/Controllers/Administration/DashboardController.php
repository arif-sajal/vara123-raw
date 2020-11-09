<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\BookingTransaction;
use App\Models\City;
use App\Models\Config;
use App\Models\Customer;
use App\Models\Property;
use App\Models\PropertyRoom;
use App\Models\PropertySpot;
use App\Models\PropertyVehicle;
use App\Models\Provider;
use App\Models\Review;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardView(){
        $all_booking = Booking::all();
        $complete_payment = BookingTransaction::where('is_payment_done',true)->get();
        $admin = Admin::where('is_active', true)->get();
        $provider = Provider::where('is_active', true)->get();
        $customer = Customer::where('is_active', true)->get();
        $amount_success = $complete_payment->sum('amount');
        $city = City::all();
        $all_property = Property::all();
        $rooms = PropertyRoom::all();
        $vehicles = PropertyVehicle::all();
        $spot = PropertySpot::all();
        $review = Review::all();
        $config = Config::all();
        $states = State::all();
        $total_amount_booked = $all_booking->sum('cost_total');
        $today = Carbon::now()->toDateString();
        $one_month_amount = 0;
        $one_year_amount = 0;
        foreach($complete_payment as $payment){
            $payment_date = $payment->updated_at->toDateString();
            $different_days = Carbon::parse($payment_date)->diffInDays($today);
            if( $different_days <= 30 ):
                $one_month_amount += $payment->amount;
            endif;
        }

        foreach($complete_payment as $payment){
            $payment_date = $payment->updated_at->toDateString();
            $different_days = Carbon::parse($payment_date)->diffInDays($today);
            if( $different_days <= 365 ):
                $one_year_amount += $payment->amount;
            endif;
        }
        
        return view('administration.pages.dashboard', compact(
            'all_booking','complete_payment','admin','provider','customer','amount_success','city', 'all_property','rooms','vehicles',
            'spot','review','config','states','total_amount_booked','one_month_amount','one_year_amount'
        ));
    }
}
