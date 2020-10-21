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
    });

    //booking confirm route start
    Route::group(['as' => 'booking.', 'prefix'=>'booking'], function(){
        Route::get('modal/{id}','BookingController@viewModal')->name('modal');
    });

    //for admin
    Route::group(['as'=>'admin.', 'prefix'=>'admin'], function(){
        Route::get('add','AdminController@viewAddAdminModal')->name('add');
        Route::get('edit/{admins:id}','AdminController@viewEditAdminModal')->name('edit');
        Route::get('resetpassword/{admins:id}','AdminController@adminPasswordReset')->name('resetpassword');
    });

    //for customer
    Route::group(['as'=>'customer.','prefix'=>'customer'], function(){
        Route::get('add','CustomerController@viewAddCustomerModal')->name('add');
        Route::get('view/{customers:id}','CustomerController@viewCustomerModal')->name('view');
        Route::get('edit/{customers:id}','CustomerController@editCustomerModal')->name('edit');
        Route::get('resetpassword/{customers:id}','CustomerController@customerResetPassword')->name('resetpassword');
    });

    //SETTING (for Vehicle Type)
    Route::group(['as'=>'setting-vehicle-type-modal.','namespace'=>'Setting','prefix'=>'setting-vehicle-type-modal'], function(){
        Route::get('add','VehicleTypeController@viewSettingVehicleTypeModal')->name('add');
        Route::get('edit/{vehicle_types:id}','VehicleTypeController@editVehicleTypeModal')->name('edit');
    });

    //SETTING (for Vehicle Manufacturer)
    Route::group(['as'=>'setting-vehicle-manufacturer-modal.','namespace'=>'Setting','prefix'=>'setting-vehicle-manufacturer-modal'], function(){
        Route::get('add','VehicleManufacturerController@viewSettingVehicleManufacturerModal')->name('add');
        Route::get('edit/{vehicle_manufacturers:id}','VehicleManufacturerController@editVehicleManufacturerModal')->name('edit');
    });

    //SETTING (for Vehicle Model)
    Route::group(['as'=>'setting-vehicle-model-modal.','namespace'=>'Setting','prefix'=>'setting-vehicle-model-modal'], function(){
        Route::get('add','VehicleModelController@addSettingVehicleModelModal')->name('add');
        Route::get('view/{vehicle_models:id}','VehicleModelController@viewSettingVehicleModelModal')->name('view');
        Route::get('edit/{vehicle_models:id}','VehicleModelController@editVehicleModelModal')->name('edit');
    });

});
