<?php

use Illuminate\Database\Seeder;

class VehicleModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\VehicleModel::class,50)->create();
    }
}
