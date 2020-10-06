<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'front', 'namespace' => 'Front\\', 'name' => 'front.'], function () {
    Route::post('customer/login', 'Auth\\LoginController@doLogin');
    Route::post('customer/registration', 'Auth\\RegistrationController@registerCustomer');
    Route::post('customer/request-password-reset', 'Auth\\ForgotPasswordController@requestResetCustomer');
    Route::post('customer/password-reset', 'Auth\\ResetPasswordController@resetNow');

    Route::get('get-property-types','PropertyController@getPropertyTypes');
    Route::match(['get','post'],'search-property','PropertyController@searchByPoint');
    Route::get('get-single-property/{slug}','PropertyController@getSingleProperty');
    Route::get('get-amenities','PropertyController@getAmenities');
    Route::get('get-billing-types','PropertyController@getBillingTypes');

    Route::group(['middleware'=>'user.authenticate:customer'],function(){
        Route::group(['prefix'=>'customer'], function () {
            Route::get('get-profile','CustomerProfileController@getProfile');
            Route::get('request-email-verification','CustomerProfileController@requestEmailVerification');
            Route::post('verify-email','CustomerProfileController@verifyEmail');
            Route::get('request-phone-verification','CustomerProfileController@requestPhoneVerification');
            Route::post('verify-phone','CustomerProfileController@verifyPhone');
            Route::post('change-password','CustomerProfileController@changePassword');
            Route::post('update-profile','CustomerProfileController@update');
            Route::post('change-avatar','CustomerProfileController@changeAvatar');
            Route::get('get-simple-report','CustomerProfileController@simpleReport');
        });

        Route::match(['get','post'],'book-item','BookingController@bookNow');
        Route::get('get-payment-methods','PaymentController@getPaymentMethods');
        Route::get('get-single-booking/{id}','BookingController@getSingleBooking');
        Route::get('get-bookings','BookingController@getBookings');
        Route::get('pay-now/{id}/{gateway}','PaymentController@payNow');
        Route::get('get-transaction/{id}','PaymentController@getTransaction');
        Route::get('add-to-bookmark/{id}','PropertyController@addToBookmark');
        Route::get('remove-from-bookmark/{id}','PropertyController@removeFromBookmark');
    });

    Route::post('sslcommerz/payment-success','PaymentController@sslcomemrzSuccess');
    Route::post('sslcommerz/payment-failed','PaymentController@sslcomemrzFailed');
    Route::post('sslcommerz/payment-canceled','PaymentController@sslcomemrzCanceled');
    Route::post('sslcommerz/ipn-validation','PaymentController@sslcomemrzIpnValidation');
});
