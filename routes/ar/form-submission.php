<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'form-submission','namespace'=>'Administration','as'=>'app.form.submission.'],function(){

    Route::group(['as'=>'property.', 'prefix'=>'property'], function () {

        Route::post('add','PropertyController@addProperty')->name('add');
        Route::post('edit/{id}','PropertyController@editProperty')->name('edit');
        Route::post('delete/{id}','PropertyController@deleteProperty')->name('delete');

        Route::group(['namespace'=>'Property'],function(){

            Route::post('room/add/{id}','RoomController@addRoom')->name('room.add');
            Route::post('room/billing/edit','RoomController@editRoomBilling')->name('room.billing.edit');
            Route::get('room/delete/{id}','RoomController@deleteRoom')->name('room.delete');

            Route::post('amenity/add/{id}','RoomController@addRoom')->name('amenity.add');
            Route::get('amenity/delete/{id}','AmenityController@deleteAmenity')->name('amenity.delete');

        });
    });

    Route::group(['as'=>'provider','prefix'=>'provider'], function(){

    });

});
