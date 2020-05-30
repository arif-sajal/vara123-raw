<?php

use Illuminate\Database\Seeder;

class RoomBedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $beds = [];
        $faker = \Faker\Factory::create();
        foreach(\App\Models\PropertyRoom::all() as $pr):
            for($i=1;$i<=$pr->bed_count;$i++):
                $beds[] = [
                    'room_id' => $pr->id,
                    'property_id' => $pr->property_id,
                    'provider_id' => $pr->provider_id,
                    'size' => $faker->randomElement(['single','double','queen','king']),
                    'for_person' => rand(1,4)
                ];
            endfor;
        endforeach;

        \App\Models\RoomBed::insert($beds);
    }
}
