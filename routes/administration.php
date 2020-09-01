<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin','namespace'=>'Administration'],function(){

    Route::get('/','Auth\LoginController@loginView')->middleware('guest')->name('login.view');
    Route::post('login','Auth\LoginController@doLogin')->middleware('guest')->name('login.do');
    Route::get('logout','Auth\LogoutController@logout')->name('logout');

    Route::group(['middleware'=>[],'as'=>'admin.'],function(){
        Route::get('dashboard','DashboardController@dashboardView')->name('dashboard');

        Route::group(['as'=>'property.', 'prefix'=>'property'], function () {
            Route::get('properties','PropertyController@propertiesView')->name('list');
            Route::get('property/view/{id}','PropertyController@singlePropertyView')->name('view');

            Route::get('property/add','PropertyController@addPropertyView')->name('add');
            Route::post('property/add','PropertyController@addProperty')->name('add');

            Route::get('property/edit/{id}','PropertyController@editPropertyView')->name('edit');
            Route::post('property/edit/{id}','PropertyController@editProperty')->name('edit');

            Route::post('property/delete/{id}','PropertyController@deleteProperty')->name('delete');

            Route::get('property/delete/{id}','PropertyController@addPropertyView')->name('delete');
        });

        //{{====================================  SOHAN'S (Booking) MODULE =========================================== }}
        Route::group(['as'=>'booking.', 'prefix'=>'booking','namespace'=>'Booking'], function () {
            Route::get('bookings','BookingController@bookingListView')->name('list');
            Route::get('booking/view/{id}','BookingController@singleBookingView')->name('view');
            Route::get('booking/delete/{id}','BookingController@deleteBooking')->name('delete');


        });


    });

});

require_once 'ar/modals.php';
require_once 'ar/tables.php';
require_once 'ar/tabs.php';
require_once 'ar/form-submission.php';
