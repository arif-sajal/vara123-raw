<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\State::class, function (Faker $faker) {
    $country = \App\Models\Country::all()->random();
    $state = $faker->state;
    return [
        'country_id' => $country->id,
        'name' => $state,
        'slug' => \Illuminate\Support\Str::slug($state)
    ];
});
