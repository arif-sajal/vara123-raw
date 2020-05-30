<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Grimzy\LaravelMysqlSpatial\Types\Point;

$factory->define(\App\Models\Property::class, function (Faker $faker) {
    $country = \App\Models\Country::all()->random();
    $state = \App\Models\State::all()->random();
    $city = \App\Models\City::all()->random();
    $provider = \App\Models\Provider::all()->random();
    $currency = \App\Models\Currency::all()->random();

    $lat = $faker->latitude;
    $lng = $faker->longitude;
    $name = $faker->company;
    return [
        'property_type_id' => rand(1,3),
        'country_id' => $country->id,
        'state_id' => $state->id,
        'city_id' => $city->id,

        'name' => $name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'slug' => \Illuminate\Support\Str::slug($name).'-'.rand(1,5000),
        'description' => $faker->text,
        'lat' => $lat,
        'lng' => $lng,
        'point' => new Point($lat, $lng),
        'address' => $faker->address,
        'provider_id' => $provider->id,
        'currency_id' => $currency->id,
    ];
});
