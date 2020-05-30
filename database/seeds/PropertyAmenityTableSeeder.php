<?php

use Illuminate\Database\Seeder;

class PropertyAmenityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\PropertyAmenity::class, 800)->create();
    }
}
