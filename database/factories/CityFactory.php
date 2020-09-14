<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\City::class, function (Faker $faker) {
    $country = \App\Models\Country::all()->random();
    $state = \App\Models\State::all()->random();
    $district = \App\Models\State::all()->random();
    $city = $faker->city;
    return [
        'country_id' => $country->id,
        'state_id' => $state->id,
        'name' => $city,
        'slug' => \Illuminate\Support\Str::slug($city)
    ];
});
