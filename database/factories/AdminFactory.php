<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Admin::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'username' => $faker->userName,
        'password' => \Illuminate\Support\Facades\Hash::make('123456'),
    ];
});
