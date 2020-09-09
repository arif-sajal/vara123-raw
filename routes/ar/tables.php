<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin/table','namespace'=>'Administration','as'=>'admin.table.'],function(){

    Route::group(['as'=>'property.', 'prefix'=>'property','namespace'=>'Property'], function () {
        Route::post('room/list/{id}','RoomController@roomsTable')->name('rooms');
        Route::post('amenity/list/{id}','AmenityController@amenitiesTable')->name('amenities');
    });

    //Put by Sohan
    Route::post('all/bookings','Booking\BookingController@allBooking')->name('bookings');

});
