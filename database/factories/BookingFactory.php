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
  $propertyItem = $faker->randomElement([
      \App\Models\PropertyRoom::all()->random(),
      \App\Models\PropertySpot::all()->random(),
      \App\Models\PropertyVehicle::all()->random()
  ]);

    return [
      'customer_id' =>$customer->id,
      'provider_id' => $provider->id,
      'currency_id' => $currency->id,
      'property_id' => $property->id,
      'item_id' => $propertyItem->id,
      'item_type' => get_class($propertyItem),
      'billing_id' => $billing->id,
      'quantity' => rand(1, 10),

      'from_date' =>$faker->date($format = 'Y-m-d', $max = 'now'),
      'to_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
      'from_time' => $faker->dateTime,
      'to_time' => $faker->dateTime,
      'cost_per_unit' => $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 500),
      'cost_total' => $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 100000),
      'admin_cut' => $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 100000),
      'provider_cut' => $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 100000),
      'is_payment_done' => 0,
      'note' => $faker->text,
    ];
});
