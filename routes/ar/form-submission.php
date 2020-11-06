<?php

use App\Http\Controllers\Administration\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'app/form-submission','namespace'=>'Administration','as'=>'app.form.submission.'],function(){

    

    Route::group(['as'=>'property.', 'prefix'=>'property','namespace'=>'Property'], function () {
        Route::post('room/add/{id}','RoomController@addRoom')->name('room.add');
        Route::post('room/billing/edit','RoomController@editRoomBilling')->name('room.billing.edit');
        Route::get('room/delete/{id}','RoomController@deleteRoom')->name('room.delete');

        Route::post('vehicle/add/{id}','VehicleController@addVehicle')->name('vehicle.add');
        Route::post('vehicle/update/{id}','VehicleController@updateBillingView')->name('vehicle.update');

        Route::post('spot/add/{id}','SpotController@addSpot')->name('spot.add');
        Route::post('spot/update/{id}','SpotController@updateSpot')->name('spot.update');
        Route::get('spot/delete/{id}','SpotController@deleteSpot')->name('spot.delete');

        Route::post('amenity/add/{id}','AmenityController@addAmenity')->name('amenity.add');
        Route::post('amenity/update/{id}','AmenityController@updateAmenity')->name('amenity.update');
        Route::get('amenity/delete/{id}','AmenityController@deleteAmenity')->name('amenity.delete');

        Route::post('gallery/add/{id}','GalleryController@addGallery')->name('gallery.add');
        Route::post('gallery/update/{id}','GalleryController@updateGallery')->name('gallery.update');
        Route::get('gallery/delete/{id}','GalleryController@deleteGallery')->name('gallery.delete');

        Route::post('timing/add/{id}','TimeController@addTime')->name('timing.add');
        Route::post('timing/update/{id}','TimeController@updateTime')->name('timing.update');
        Route::get('timing/delete/{id}','TimeController@deleteTime')->name('timing.delete');
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
        Route::post('duepay/{id}','ProviderController@duePay')->name('duePay');
        
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

    //for setting
    Route::group(['as'=>'setting.vehicle.model.','prefix'=>'setting/model', 'namespace'=>'Setting'], function(){
        Route::post('add','VehicleModelController@addVehicleModel')->name('add');
        Route::post('update/{id}','VehicleModelController@updateVehicleModel')->name('update');
    });

    Route::group(['as'=>'setting.vehicle.manufacture.','prefix'=>'setting/manufacture', 'namespace'=>'Setting'], function(){
        Route::post('add','VehicleManufacturerController@addVehicleManufacturer')->name('add');
        Route::post('update/{id}','VehicleManufacturerController@updateVehicleModel')->name('update');
    });

    Route::group(['as'=>'setting.vehicle.type.','prefix'=>'setting/type', 'namespace'=>'Setting'], function(){
        Route::post('add','VehicleTypeController@addVehicleType')->name('add');
        Route::post('update/{id}','VehicleTypeController@updateVehicleType')->name('update');
    });

    Route::group(['as'=>'setting.config.','prefix'=>'setting/config', 'namespace'=>'Setting'], function(){
        Route::post('add','VehicleTypeController@addVehicleType')->name('add');
        Route::post('update','ConfigController@update_config')->name('update');
    });

});
