<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Booking;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {

  $customer = \App\Models\Customer::all()->random();
  $provider = \App\Models\Provider::all()->random();
  $currency = \App\Models\Currency::all()->random();
  $property = \App\Models\Property::all()->random();
  $billing =  \App\Models\Billing::all()->random();

    return [
      'customer_id' =>$customer->id,
      'provider_id' => $provider->id,
      'currency_id' => $currency->id,
      'property_id' => $property->id,
      'item_id' => 1,
      'item_type' => 'App/Models/BookingItem',
      'billing_id' => $billing->id,

      'from_date' =>$faker->date($format = 'Y-m-d', $max = 'now'),
      'to_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
      'from_time' => $faker->dateTime,
      'to_time' => $faker->dateTime,
      'cost_per_unit' => $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 500),
      'quantity' => 1,
      'cost_total' => $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 100000),
      'is_payment_done' => 0,
      'note' => $faker->text,

    ];
});
