<?php

use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties = \App\Models\Property::all();
        $reviews = [];
        $faker = \Faker\Factory::create();
        foreach($properties as $property):
            if($property->rooms()->exists()):
                foreach($property->rooms as $room):
                    $total = rand(0,10);
                    $quality = rand(1,5);
                    $location = rand(1,5);
                    $price = rand(1,5);
                    $service = rand(1,5);
                    for ($i=0;$i <= $total;$i++):
                        $reviews[] = [
                            'property_id'=> $property->id,
                            'customer_id'=> rand(1,50),
                            'item_id'=> $room->id,
                            'item_type'=> get_class($room),
                            'quality'=> $quality,
                            'location'=> $location,
                            'price'=> $price,
                            'service'=> $service,
                            'average'=> ($quality + $location + $price + $service) / 4,
                            'review'=> $faker->text(300),
                        ];
                    endfor;
                endforeach;
            elseif($property->vehicles()->exists()):
                foreach($property->vehicles as $vehicle):
                    $total = rand(0,10);
                    $quality = rand(1,5);
                    $location = rand(1,5);
                    $price = rand(1,5);
                    $service = rand(1,5);
                    for ($i=0;$i <= $total;$i++):
                        $reviews[] = [
                            'property_id'=> $property->id,
                            'customer_id'=> rand(1,50),
                            'item_id'=> $vehicle->id,
                            'item_type'=> get_class($vehicle),
                            'quality'=> $quality,
                            'location'=> $location,
                            'price'=> $price,
                            'service'=> $service,
                            'average'=> ($quality + $location + $price + $service) / 4,
                            'review'=> $faker->text(300),
                        ];
                    endfor;
                endforeach;
            elseif($property->spots()->exists()):
                foreach($property->spots as $spot):
                    $total = rand(0,10);
                    $quality = rand(1,5);
                    $location = rand(1,5);
                    $price = rand(1,5);
                    $service = rand(1,5);
                    for ($i=0;$i <= $total;$i++):
                        $reviews[] = [
                            'property_id'=> $property->id,
                            'customer_id'=> rand(1,50),
                            'item_id'=> $spot->id,
                            'item_type'=> get_class($spot),
                            'quality'=> $quality,
                            'location'=> $location,
                            'price'=> $price,
                            'service'=> $service,
                            'average'=> ($quality + $location + $price + $service) / 4,
                            'review'=> $faker->text(300),
                        ];
                    endfor;
                endforeach;
            endif;
        endforeach;

        foreach (array_chunk($reviews,1000) as $rev):
            \App\Models\Review::insert($rev);
        endforeach;
    }
}
