<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Administration'], function () {

    Route::group(['middleware'=>[], 'as'=>'admin.tab.', 'prefix'=>'tab'],function(){
        Route::get('property/{item}/list/{id}','PropertyController@getTab')->name('item.list');
    });

});
