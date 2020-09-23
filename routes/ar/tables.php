<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'table','namespace'=>'Administration','as'=>'app.table.'],function(){

    Route::post('all/providers','ProviderController@providersTable')->name('providers');
    Route::post('all/customers','CustomerController@customersTable')->name('customers');
    Route::post('all/admins','AdminController@adminsTable')->name('admins');

    Route::group(['as'=>'property.', 'prefix'=>'property','namespace'=>'Property'], function () {
        Route::post('room/list/{id}','RoomController@roomsTable')->name('rooms');
        Route::post('vehicle/list/{id}','VehicleController@vehiclesTable')->name('vehicles');
        Route::post('amenity/list/{id}','AmenityController@amenitiesTable')->name('amenities');
    });

    Route::post('all/bookings','BookingController@bookingsTable')->name('bookings');

    Route::group(['as'=>'setting.', 'prefix'=>'setting', 'namespace'=>'Setting'],function(){
        Route::post('vehicle-types', 'VehicleTypeController@vehicleTypesTable')->name('vehicle.types');
        Route::post('vehicle-manufacturers', 'VehicleManufacturerController@vehicleManufacturersTable')->name('vehicle.manufacturers');
    });

});
