<?php

use Illuminate\Database\Seeder;

class BillingTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['type'=>'Hourly','per'=>'Hour'],
            ['type'=>'Daily','per'=>'Day'],
        ];

        \App\Models\BillingType::insert($types);
    }
}
