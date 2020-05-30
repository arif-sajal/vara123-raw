<?php

use Illuminate\Database\Seeder;

class PropertyVehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicles = [];
        $faker = \Faker\Factory::create();
        foreach(\App\Models\Property::where('property_type_id','3')->get() as $property):
            for($i=1;$i<=rand(1,10);$i++):
                $vehicleModel = \App\Models\VehicleModel::all()->random();
                $provider = \App\Models\Provider::all()->random();
                $total = rand(5,15);
                $available = rand(1,$total);
                $vehicles[] = [
                    'vehicle_model_id' => $vehicleModel->id,
                    'property_id' => $property->id,
                    'provider_id' => $provider->id,
                    'total' => $total,
                    'available' => $available,
                    'booked' => $total - $available,
                ];
            endfor;
        endforeach;

        \App\Models\PropertyVehicle::insert($vehicles);
    }
}
