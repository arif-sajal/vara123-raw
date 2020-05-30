<?php

use Illuminate\Database\Seeder;

class CompatibleSpotVehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csc = [];
        foreach(\App\Models\PropertySpot::all() as $spot):
            $carModels =  \App\Models\VehicleType::all()->random(rand(2,10));
            foreach($carModels as $cm):
                $csc[] = [
                    'property_spot_id' => $spot->id,
                    'vehicle_type_id' => $cm->id
                ];
            endforeach;
        endforeach;

        \App\Models\CompatibleSpotVehicle::insert($csc);
    }
}
