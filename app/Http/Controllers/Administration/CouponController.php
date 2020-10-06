<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Coupon\Add;
use App\Http\Requests\Administration\Coupon\Update;
use App\Models\Coupon;
use Yajra\DataTables\Facades\DataTables;
use Library\Notify\Facades\Notify;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function couponList(){
        return view('administration.pages.coupon.list');
    }
    public function viewCouponModal(){
        return view('administration.modals.coupon.add');
    }
    public function viewEditModal(Coupon $coupon){
        return view('administration.modals.coupon.edit',compact('coupon'));
    }
    public function couponsTable(){
        $coupons = Coupon::query();

        return DataTables::make($coupons->latest()->get())
            ->addColumn('action',function(Coupon $coupons){
                return "
                    <button class='btn btn-sm btn-info'data-content='"
                    .route('app.modal.coupon.edit',$coupons->id)."
                    'data-hover='tooltip' data-original-title='Edit Coupon' data-toggle='modal' data-target='#myModal' data-content=''><i class='la la-pencil'></i></button>

                    <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".
                    route('app.form.submission.coupon.delete',$coupons->id)."' data-hover='tooltip'
                    data-original-title='Delete Coupon'><i class='la la-trash' data-action='confirm' data-action-route=''></i></button>

                ";
            })
            ->toJson();
    }
    public function addCoupon(Add $request){
        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->discount_type = $request->type;
        $coupon->amount = $request->amount;
        if($coupon->save()):
            return Notify::send('success', 'Coupon added successfully')->reload('table','CouponsTable')->json();
        endif;
    }
    public function updateCoupon(Update $request, $id){
        $coupon = Coupon::find($id);
        $coupon->code = $request->code;
        $coupon->discount_type = $request->type;
        $coupon->amount = $request->amount;
        if($coupon->save()):
            return Notify::send('success', 'Coupon updated successfully')->reload('table','CouponsTable')->json();
        endif;
    }
    public function deleteCoupon($id){
        $coupon = Coupon::find($id);
        if( $coupon->delete() ):
            return Notify::send('success', 'Coupon deleted successfully')->reload('table','CouponsTable')->json();

        endif;
    }
}
