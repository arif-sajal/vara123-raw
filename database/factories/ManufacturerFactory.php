<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\VehicleManufacturer::class, function (Faker $faker) {
    $country = \App\Models\Country::all()->random();
    return [
        'name' => $faker->colorName,
        'logo' => $faker->imageUrl(),
        'country_id' => $country->id
    ];
});
