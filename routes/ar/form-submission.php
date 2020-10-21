<?php

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
    });

    //for customer
    Route::group(['as'=>'customer.','prefix'=>'customer'], function(){
        Route::post('add','CustomerController@addCustomer')->name('add');
        Route::post('update/{id}','CustomerController@updateCustomer')->name('update');
        Route::get('delete/{id}','CustomerController@deleteCustomer')->name('delete');
        Route::post('passwordreset/{id}','CustomerController@customerPasswordReset')->name('passwordreset');
    });

    //SETTING (for Vehicle Type)
    Route::group(['as'=>'setting-vehicle-type.','namespace'=>'Setting','prefix'=>'setting-vehicle-type'], function(){
        Route::post('add','VehicleTypeController@addVehicleType')->name('add');
        Route::post('update/{id}','VehicleTypeController@updateVehicleType')->name('update');
        Route::get('delete/{id}','VehicleTypeController@deleteVehicleType')->name('delete');
    });

    //SETTING (for Vehicle Manufacturer)
    Route::group(['as'=>'setting-vehicle-manufacturer.','namespace'=>'Setting','prefix'=>'setting-vehicle-manufacturer'], function(){
        Route::post('add','VehicleManufacturerController@addVehicleManufacturer')->name('add');
        Route::post('update/{id}','VehicleManufacturerController@updateVehicleManufacturer')->name('update');
        Route::get('delete/{id}','VehicleManufacturerController@deleteVehicleManufacturer')->name('delete');
    });

    //SETTING (for Vehicle Model)
    Route::group(['as'=>'setting-vehicle-model.','namespace'=>'Setting','prefix'=>'setting-vehicle-model'], function(){
        Route::post('add','VehicleModelController@addVehicleModel')->name('add');
        Route::post('update/{id}','VehicleModelController@updateVehicleModel')->name('update');
        Route::get('delete/{id}','VehicleModelController@deleteVehicleModel')->name('delete');
    });

});
