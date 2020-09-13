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

});
