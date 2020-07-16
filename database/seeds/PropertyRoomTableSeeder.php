<?php

use Illuminate\Database\Seeder;

class PropertyRoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [];
        $faker = \Faker\Factory::create();
        foreach(\App\Models\Property::where('property_type_id','1')->get() as $property):
            $provider = \App\Models\Provider::all()->random();
            for ($i=1;$i <= rand(1,10);$i++):
                $total = rand(5,15);
                $available = rand(1,$total);
                $rooms[] = [
                    'property_id' => $property->id,
                    'provider_id' => $provider->id,
                    'total' => $total,
                    'available' => $available,
                    'booked' => $total - $available,
                    'description' => $faker->text(500),
                    'for_person' => rand(1,4),
                    'bed_count' => rand(1,4),
                    'room_type' => $faker->randomElement(['single','double','queen','king'])
                ];
            endfor;
        endforeach;

        \App\Models\PropertyRoom::insert($rooms);
    }
}
