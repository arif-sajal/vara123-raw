<?php

use Illuminate\Database\Seeder;

class PaymentMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods = [
            ['name'=>'SSLCommerz','identity'=>'sslcommerz'],
            ['name'=>'On Spot','identity'=>'on_spot']
        ];

        \App\Models\PaymentMethod::insert($methods);
    }
}
