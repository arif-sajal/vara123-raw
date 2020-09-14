<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Country::class, function (Faker $faker) {
    $country = $faker->country;
    return [
        'name' => $country,
        'slug' => \Illuminate\Support\Str::slug($country)
    ];
});
