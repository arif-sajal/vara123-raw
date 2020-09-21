<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Administration'], function () {

    Route::group(['middleware'=>[], 'as'=>'app.tab.', 'prefix'=>'tab'],function(){
        Route::get('property/{item}/list/{id}','PropertyController@getTab')->name('item.list');
        Route::group(['as'=>'setting.', 'prefix'=>'setting', 'namespace'=>'Setting'], function(){
            Route::get('vehicle-models', 'VehicleModelController@vehicleModelsListView')->name('vehicle.model');
            Route::get('vehicle-manufacturers', 'VehicleManufacturerController@vehicleManufacturersListView')->name('vehicle.manufacturer');
            Route::get('vehicle-type', 'VehicleTypeController@vehicleTypesListView')->name('vehicle.type');
        });
    });

});
