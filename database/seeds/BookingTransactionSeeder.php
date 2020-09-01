<?php

use Illuminate\Database\Seeder;

class BookingTransactionSeeder extends Seeder
{

    public function run()
    {
        factory(App\Models\BookingTransaction::class,10)->create();
    }
}
