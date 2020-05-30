<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\PropertyAmenity::class, function (Faker $faker) {
    $property = \App\Models\Property::all()->random();
    $amenity = \App\Models\Amenity::all()->random();
    return [
        'property_id' => $property->id,
        'amenity_id' => $amenity->id
    ];
});
