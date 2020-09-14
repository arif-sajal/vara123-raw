<?php

use Illuminate\Database\Seeder;

class MeasurementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mss = [
            ['name'=>'Centimeter','unit'=>1,'short_code'=>'cm','symbol'=>'cm'],
            ['name'=>'Inch','unit'=>0.393701,'short_code'=>'in','symbol'=>'in'],
            ['name'=>'Feet','unit'=>0.0328084,'short_code'=>'ft','symbol'=>'ft'],
            ['name'=>'Meter','unit'=>0.01,'short_code'=>'m','symbol'=>'m'],
        ];

        \App\Models\MeasurementUnit::insert($mss);
    }
}
