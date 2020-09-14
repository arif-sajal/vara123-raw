<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin/form-submission','namespace'=>'Administration','as'=>'admin.form.submission.'],function(){

    Route::group(['as'=>'property.', 'prefix'=>'property','namespace'=>'Property'], function () {
        Route::post('room/add/{id}','RoomController@addRoom')->name('room.add');
        Route::post('room/billing/edit','RoomController@editRoomBilling')->name('room.billing.edit');
        Route::get('room/delete/{id}','RoomController@deleteRoom')->name('room.delete');

        Route::post('amenity/add/{id}','RoomController@addRoom')->name('amenity.add');
        Route::get('amenity/delete/{id}','AmenityController@deleteAmenity')->name('amenity.delete');
    });

});
