<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin/form-submission','namespace'=>'Administration','as'=>'admin.form.submission.'],function(){

    Route::group(['as'=>'property.', 'prefix'=>'property','namespace'=>'Property'], function () {
        Route::post('room/add/{id}','RoomController@addRoom')->name('room.add');
        Route::get('room/delete/{id}','RoomController@deleteRoom')->name('room.delete');
    });

});
