<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'modal','namespace'=>'Administration','as'=>'app.modal.'],function(){

    Route::group(['as'=>'property.', 'prefix'=>'property','namespace'=>'Property'], function () {
        Route::get('room/add/{id}','RoomController@addRoomView')->name('room.add');
        Route::get('room/view/{id}','RoomController@roomView')->name('room.view');
        Route::get('room/billing/edit/{id}','RoomController@editBillingView')->name('room.billing.edit');

        Route::get('vehicle/add/{id}','VehicleController@addVehicleView')->name('vehicle.add');
        Route::get('vehicle/view/{id}','VehicleController@vehicleView')->name('vehicle.view');
        Route::get('vehicle/billing/edit/{id}','VehicleController@editBillingView')->name('vehicle.billing.edit');
    });

    //for coupon
    Route::group(['as'=>'coupon.','prefix'=> 'coupon'], function(){
        Route::get('add','CouponController@viewCouponModal')->name('add');
        Route::get('edit/{coupon:id}','CouponController@viewEditModal')->name('edit');
    });

    //for providers
    Route::group(['as'=>'provider.','prefix'=> 'provider'], function(){
        Route::get('add','ProviderController@viewAddModal')->name('add');
        Route::get('edit/{provider:id}','ProviderController@viewEditModal')->name('edit');
        Route::get('resetpassword/{provider:id}','ProviderController@providerPasswordReset')->name('resetpassword');
        Route::get('editProfile/{id}','ProviderController@editProfile')->name('editProfile');
    });

    //booking payment confirm route start
    Route::group(['as' => 'paynow.', 'prefix'=>'booking'], function(){
        Route::get('paynow/{id}','BookingController@completePayment')->name('modal');
    });

    //booking completion route start
    Route::group(['as' => 'booking.', 'prefix'=>'booking'], function(){
        Route::get('completion/provider/{id}','BookingController@providerCompletion')->name('providerCompletion');
        Route::get('completion/customer/{id}','BookingController@customerCompletion')->name('customerCompletion');
    });

    //for admin
    Route::group(['as'=>'admin.', 'prefix'=>'admin'], function(){
        Route::get('add','AdminController@viewAddAdminModal')->name('add');
        Route::get('edit/{admins:id}','AdminController@viewEditAdminModal')->name('edit');
        Route::get('resetpassword/{admins:id}','AdminController@adminPasswordReset')->name('resetpassword');
        Route::get('editProfile/{id}','AdminController@editProfile')->name('editProfile');
    });

    //for customer
    Route::group(['as'=>'customer.','prefix'=>'customer'], function(){
        Route::get('add','CustomerController@viewAddCustomerModal')->name('add');
        Route::get('view/{customers:id}','CustomerController@viewCustomerModal')->name('view');
        Route::get('edit/{customers:id}','CustomerController@editCustomerModal')->name('edit');
        Route::get('resetpassword/{customers:id}','CustomerController@customerResetPassword')->name('resetpassword');
    });

    //payout request modal start
    Route::group(['as'=>'provider.payout.','prefix'=>'payout'], function(){
        Route::get('payout/modal/{id}','PayoutController@payoutModal')->name('modal');
    });

});
