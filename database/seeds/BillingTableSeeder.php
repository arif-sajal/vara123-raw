<?php

use Illuminate\Database\Seeder;

class BillingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $billings = [];
        $billingTypes = \App\Models\BillingType::all();
        foreach(\App\Models\Property::all() as $property):
            if($property->rooms()->exists()):
                foreach ($property->rooms as $room):
                    foreach ($billingTypes as $billingType):
                        $billings[] = [
                            'property_id' => $property->id,
                            'item_id' => $room->id,
                            'item_type' => get_class($room),
                            'billing_type_id' => $billingType->id,
                            'amount' => rand(5,1000),
                            'currency_id' => $property->currency_id,
                            'active' => true,
                        ];
                    endforeach;
                endforeach;
            elseif($property->spots()->exists()):
                foreach ($property->spots as $spot):
                    foreach ($billingTypes as $billingType):
                        $billings[] = [
                            'property_id' => $property->id,
                            'item_id' => $spot->id,
                            'item_type' => get_class($spot),
                            'billing_type_id' => $billingType->id,
                            'amount' => rand(5,1000),
                            'currency_id' => $property->currency_id,
                            'active' => true,
                        ];
                    endforeach;
                endforeach;
            elseif($property->vehicles()->exists()):
                foreach ($property->vehicles as $vehicle):
                    foreach ($billingTypes as $billingType):
                        $billings[] = [
                            'property_id' => $property->id,
                            'item_id' => $vehicle->id,
                            'item_type' => get_class($vehicle),
                            'billing_type_id' => $billingType->id,
                            'amount' => rand(5,1000),
                            'currency_id' => $property->currency_id,
                            'active' => true,
                        ];
                    endforeach;
                endforeach;
            endif;
        endforeach;

        \App\Models\Billing::insert($billings);
    }
}
