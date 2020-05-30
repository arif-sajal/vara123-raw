<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Customer::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'username' => $faker->userName,
        'address' => $faker->address,
        'country' => $faker->country,
        'state' => $faker->state,
        'city' => $faker->city,
        'post_code' => $faker->postcode,
        'password' => \Illuminate\Support\Facades\Hash::make('123456'),
    ];
});
