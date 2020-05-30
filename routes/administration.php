<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin','namespace'=>'Administration'],function(){

    Route::get('/','Auth\LoginController@loginView')->middleware('guest')->name('login.view');
    Route::post('login','Auth\LoginController@doLogin')->middleware('guest')->name('login.do');
    Route::get('logout','Auth\LogoutController@logout')->name('logout');

    Route::group(['middleware'=>[],'as'=>'admin.'],function(){
        Route::get('dashboard','DashboardController@dashboardView')->name('dashboard');
        Route::get('properties','PropertyController@propertiesView')->name('properties');
        Route::get('property/view/{id}','PropertyController@singlePropertyView')->name('property.view');
        Route::get('property/add','PropertyController@addPropertyView')->name('property.add');
    });
});
