<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'table','namespace'=>'Administration','as'=>'app.table.'],function(){

    Route::post('all/providers','ProviderController@providersTable')->name('providers');

    Route::group(['as'=>'property.', 'prefix'=>'property','namespace'=>'Property'], function () {
        Route::post('room/list/{id}','RoomController@roomsTable')->name('rooms');
        Route::post('amenity/list/{id}','AmenityController@amenitiesTable')->name('amenities');
    });

    Route::post('all/bookings','BookingController@bookingsTable')->name('bookings');

});
