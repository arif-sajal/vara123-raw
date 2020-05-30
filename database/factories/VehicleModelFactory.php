<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\VehicleModel::class, function (Faker $faker) {
    $manufacturer = \App\Models\VehicleManufacturer::all()->random();
    $vehicleType = \App\Models\VehicleType::all()->random();
    $measurement = \App\Models\MeasurementUnit::all()->random();
    return [
        'manufacturer_id' => $manufacturer->id,
        'vehicle_type_id' => $vehicleType->id,

        'model_name' => $faker->colorName,
        'model_year' => $faker->year,

        'height' => $faker->randomFloat(2,10,50),
        'width' => $faker->randomFloat(2,10,50),
        'length' => $faker->randomFloat(2,10,50),

        'mileage' => $faker->randomFloat(2,10,50),
        'transmission' => $faker->randomNumber(),
        'fuel_type' => $faker->colorName,
        'door_count' => $faker->randomNumber(),
        'image' => $faker->imageUrl(),
    ];
});
