<?php

use Illuminate\Database\Seeder;

class TimingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timings = [];

        foreach(\App\Models\Property::all() as $property):
            for($i=1;$i<=7;$i++):
                $timings[] = [
                    'property_id' => $property->id,
                    'day_name' => now()->subDays($i)->format('D'),
                    'day_number' => now()->subDays($i)->dayOfWeek,
                    'opening' => now()->format('H:i:s'),
                    'closing' => now()->addHour(8)->format('H:i:s'),
                ];
            endfor;
        endforeach;

        \App\Models\Timing::insert($timings);
    }
}
