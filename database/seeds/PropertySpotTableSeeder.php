<?php

use Illuminate\Database\Seeder;

class PropertySpotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $spots = [];
        $faker = \Faker\Factory::create();
        foreach(\App\Models\Property::where('property_type_id','2')->get() as $property):
            $provider = \App\Models\Provider::all()->random();
            $total = rand(5,15);
            $available = rand(1,$total);
            $spots[] = [
                'property_id' => $property->id,
                'provider_id' => $provider->id,
                'total' => $total,
                'available' => $available,
                'booked' => $total - $available,
                'name' => $faker->name,
            ];
        endforeach;

        \App\Models\PropertySpot::insert($spots);
    }
}
