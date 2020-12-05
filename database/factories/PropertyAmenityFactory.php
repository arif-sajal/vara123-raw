<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\PropertyAmenity::class, function (Faker $faker) {
    $property = \App\Models\Property::inRandomOrder()->first();
    $amenity = \App\Models\Amenity::inRandomOrder()->first();
    return [
        'property_id' => 1,
        'amenity_id' => 1
    ];
});
