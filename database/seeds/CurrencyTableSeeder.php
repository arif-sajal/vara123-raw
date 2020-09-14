<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            ['name'=>'Bangladeshi Taka','unit'=>85,'short_code'=>'BDT','symbol'=>'৳','format'=>'1,0.00 %s'],
            ['name'=>'United States Dollar','unit'=>1,'short_code'=>'USD','symbol'=>'$','format'=>'%s 1,0.00'],
        ];

        \App\Models\Currency::insert($currencies);
    }
}
