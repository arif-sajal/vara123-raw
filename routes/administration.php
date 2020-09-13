<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'=>'Administration'],function(){

    Route::get('/','Auth\LoginController@loginView')->middleware('guest')->name('login.view');
    Route::post('login','Auth\LoginController@doLogin')->middleware('guest')->name('login.do');
    Route::get('logout','Auth\LogoutController@logout')->name('logout');

    Route::group(['middleware'=>[],'as'=>'app.'],function(){
        Route::get('dashboard','DashboardController@dashboardView')->name('dashboard');

        Route::group(['as'=>'property.', 'prefix'=>'property'], function () {
            Route::get('all','PropertyController@propertyListView')->name('list');
            Route::get('view/{id}','PropertyController@singlePropertyView')->name('view');
            Route::get('add','PropertyController@addPropertyView')->name('add');
            Route::get('edit/{id}','PropertyController@editPropertyView')->name('edit');
        });

        Route::group(['as'=>'provider.', 'prefix'=>'provider'], function () {
            Route::get('all','ProviderController@providerListView')->name('list');
            Route::get('status/switch/{id}','ProviderController@switchActivationStatus')->name('switch.status');
        });

        //{{====================================  SOHAN'S (Booking) MODULE =========================================== }}
        Route::group(['as'=>'booking.', 'prefix'=>'booking'], function () {
            Route::get('all','BookingController@bookingListView')->name('list');
            Route::get('view/{id}','BookingController@singleBookingView')->name('view');
            Route::get('delete/{id}','BookingController@deleteBooking')->name('delete');
        });


    });

});

require_once 'ar/modals.php';
require_once 'ar/tables.php';
require_once 'ar/tabs.php';
require_once 'ar/form-submission.php';
