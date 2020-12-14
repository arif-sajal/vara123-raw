<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([],function(){
     Route::post('register','Front\RegistrationController@register')->name('front.register');
});

include_once "ar/front.php";