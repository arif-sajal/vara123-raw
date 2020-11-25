<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Administration'], function () {

    Route::group(['middleware'=>[], 'as'=>'app.tab.', 'prefix'=>'tab'],function(){
        Route::get('property/{item}/list/{id}','PropertyController@getTab')->name('item.list');
        Route::get('property_type/list/{item}','PropertyController@getPropertyTab')->name('item.property.list');
        Route::group(['as'=>'setting.', 'prefix'=>'setting', 'namespace'=>'Setting'], function(){
            Route::get('vehicle-models', 'VehicleModelController@vehicleModelsListView')->name('vehicle.model');
            Route::get('vehicle-manufacturers', 'VehicleManufacturerController@vehicleManufacturersListView')->name('vehicle.manufacturer');
            Route::get('vehicle-type', 'VehicleTypeController@vehicleTypesListView')->name('vehicle.type');
            Route::get('config', 'ConfigController@config_list')->name('vehicle.config');
            Route::get('country', 'CountryController@country_list')->name('all.country');
            Route::get('state', 'StateController@state_list')->name('all.state');
            Route::get('city', 'CityController@city_list')->name('all.city');
            Route::get('amenity', 'AmenityController@amenity_list')->name('all.amenity');
        });
       
    });

});
