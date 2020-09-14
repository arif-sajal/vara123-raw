<?php

use Illuminate\Database\Seeder;

class VehicleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name'=>'Sedan','icon'=>''],
            ['name'=>'SUV','icon'=>''],
            ['name'=>'Wagon','icon'=>''],
            ['name'=>'Couple','icon'=>''],
            ['name'=>'Hatchback','icon'=>''],
            ['name'=>'Pickup','icon'=>''],
            ['name'=>'Compact','icon'=>''],
            ['name'=>'Sports Car','icon'=>''],
            ['name'=>'Van','icon'=>''],
            ['name'=>'Crossover','icon'=>''],
        ];

        \App\Models\VehicleType::insert($types);
    }
}
