<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BookingTransaction;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(BookingTransaction::class, function (Faker $faker) {
    $booking =  \App\Models\Booking::all()->random();
    $currency = \App\Models\Currency::all()->random();
    $paidBy = ['Cash','Online Payment'];

    return [
      'booking_id' => $booking->id,
      'payment_method_id' =>1,
      'currency_id' => $currency->id,

      'amount' => $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 10000),
      'payment_initiation_server_response' => 'ok',
      'payment_validation_server_response' =>'done',
      'paid_by' => $faker->randomElement($paidBy),
      'is_payment_done' => 0
    ];
});
