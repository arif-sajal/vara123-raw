<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin/modal','namespace'=>'Administration','as'=>'admin.modal.'],function(){

    Route::group(['as'=>'property.', 'prefix'=>'property','namespace'=>'Property'], function () {
        Route::get('room/add/{id}','RoomController@addRoomView')->name('room.add');
        Route::get('room/view/{id}','RoomController@roomView')->name('room.view');
        Route::get('room/billing/edit/{id}','RoomController@editBillingView')->name('room.billing.edit');
    });

});
