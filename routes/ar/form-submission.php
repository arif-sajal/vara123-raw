<?php

use App\Http\Controllers\Administration\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'app/form-submission','namespace'=>'Administration','as'=>'app.form.submission.'],function(){

    Route::group(['as'=>'property.', 'prefix'=>'property','namespace'=>'Property'], function () {
        Route::post('room/add/{id}','RoomController@addRoom')->name('room.add');
        Route::post('room/billing/edit','RoomController@editRoomBilling')->name('room.billing.edit');
        Route::get('room/delete/{id}','RoomController@deleteRoom')->name('room.delete');

        Route::post('amenity/add/{id}','RoomController@addRoom')->name('amenity.add');
        Route::get('amenity/delete/{id}','AmenityController@deleteAmenity')->name('amenity.delete');
    });

    //for coupon
    Route::group(['as'=>'coupon.','prefix'=>'coupon'], function(){
        Route::post('add','CouponController@addCoupon')->name('add');
        Route::post('update/{id}','CouponController@updateCoupon')->name('update');
        Route::get('delete/{id}','CouponController@deleteCoupon')->name('delete');
    });

    //for provider
    Route::group(['as'=>'provider.','prefix'=>'provider'], function(){
        Route::post('add','ProviderController@addProvider')->name('add');
        Route::post('update/{id}', 'ProviderController@updateProvider')->name('update');
        Route::get('delete/{id}','ProviderController@deleteProvider')->name('delete');
        Route::post('passwordreset/{id}', 'ProviderController@reset')->name('passwordreset');
        Route::post('update/profile/{id}','ProfileController@updateProviderProfile')->name('profile.update');
    });

    //for booking confirmation
    Route::group(['as'=>'booking.','prefix'=>'booking'], function(){
        Route::post('confirm/{id}','BookingController@confirmBooking')->name('confirm');
    });

    //for admin
    Route::group(['as'=>'admin.', 'prefix'=>'admin'], function(){
        Route::post('add', 'AdminController@addAdmin')->name('add');
        Route::post('update/{id}', 'AdminController@updateAdmin')->name('update');
        Route::get('delete/{id}', 'AdminController@deleteAdmin')->name('delete');
        Route::post('password-reset/{id}', 'AdminController@reset')->name('passwordreset');
        Route::post('update/profile/{id}','ProfileController@updateAdminProfile')->name('profile.update');
    });

    //for customer
    Route::group(['as'=>'customer.','prefix'=>'customer'], function(){
        Route::post('add','CustomerController@addCustomer')->name('add');
        Route::post('update/{id}','CustomerController@updateCustomer')->name('update');
        Route::get('delete/{id}','CustomerController@deleteCustomer')->name('delete');
        Route::post('passwordreset/{id}','CustomerController@customerPasswordReset')->name('passwordreset');
    });

    //for payout request
    Route::group(['as'=>'payout.','prefix'=>'payout'], function(){
        Route::post('payout/request/{id}','PayoutController@payout')->name('request');
        Route::get('confirm/{id}','PayoutController@payoutDone')->name('done');
    });

});
