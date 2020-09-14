<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Administration'], function () {

    Route::group(['middleware'=>[], 'as'=>'app.tab.', 'prefix'=>'tab'],function(){
        Route::get('property/{item}/list/{id}','PropertyController@getTab')->name('item.list');
    });

});
