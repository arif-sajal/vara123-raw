<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin/table','namespace'=>'Administration','as'=>'admin.table.'],function(){

    Route::group(['as'=>'property.', 'prefix'=>'property','namespace'=>'Property'], function () {
        Route::post('rooms/list/{id}','RoomController@roomsTable')->name('rooms');
    });

});
