<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Amenity::class, function (Faker $faker) {
    $array = [
        '1'
    ];
    $iconClasses = [
        'air-freshener','baby','baby-carriage','basketball-ball','bath','broom','capsules','chair','chess'
    ];
    return [
        'name' => $faker->colorName,
        'icon' => $faker->randomElement($iconClasses),
        'property_type_id' => $faker->randomElement($array)
    ];
});
