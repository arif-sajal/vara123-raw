<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'table','namespace'=>'Administration','as'=>'app.table.'],function(){

    Route::post('all/providers','ProviderController@providersTable')->name('providers');
    Route::post('all/customers','CustomerController@customersTable')->name('customers');
    Route::post('all/admins','AdminController@adminsTable')->name('admins');
    Route::post('all/coupons','CouponController@couponsTable')->name('coupons');
    Route::post('all/payoutrequests','PayoutController@payoutTable')->name('payout');

    Route::group(['as'=>'property.', 'prefix'=>'property','namespace'=>'Property'], function () {
        Route::post('room/list/{id}','RoomController@roomsTable')->name('rooms');
        Route::post('vehicle/list/{id}','VehicleController@vehiclesTable')->name('vehicles');
        Route::post('spot/list/{id}','SpotController@spotTable')->name('spots');
        Route::post('amenity/list/{id}','AmenityController@amenitiesTable')->name('amenities');
        Route::post('gallery/list/{id}','GalleryController@galleryTable')->name('gallery');
        Route::post('timings/list/{id}','TimeController@timeTable')->name('time');
    });

    Route::post('all/bookings','BookingController@bookingsTable')->name('bookings');

    Route::group(['as'=>'setting.', 'prefix'=>'setting', 'namespace'=>'Setting'],function(){
        Route::post('vehicle_modal', 'VehicleModelController@vehicleModelsTable')->name('vehicle_modal');
        Route::post('vehicle-types', 'VehicleTypeController@vehicleTypesTable')->name('vehicle.types');
        Route::post('vehicle-manufacturers', 'VehicleManufacturerController@vehicleManufacturersTable')->name('vehicle.manufacturers');
        Route::post('config', 'ConfigController@config_table')->name('config.table');
    });

});
