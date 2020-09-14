<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookingAddress extends Seeder
{

    public function run()
    {
      $booking =  \App\Models\Booking::all()->random();
      $faker = Faker::create();

        foreach (range(1,10) as $index) {

          DB::table('booking_addresses')->insert([
              'booking_id' => $booking->id,
              'country' => $faker->country,
              'state' => $faker->state,
              'city' => $faker->city,
              'street' => $faker->streetName,
              'postal_code' => $faker->postcode,
          ]);
        }
    }
}
