<?php

use Illuminate\Database\Seeder;

class BookingTableSeeder extends Seeder
{

    public function run()
    {
        factory(App\Models\Booking::class,500)->create();
    }
}
