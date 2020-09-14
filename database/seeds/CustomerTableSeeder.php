<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Customer::class,200)->create();

        \App\Models\Customer::insert([
            'first_name' => 'John',
            'last_name' => 'Customer',
            'email' => 'customer@fakemail.com',
            'username' => 'customer',
            'country' => 'Bangladesh',
            'state' => 'Dhaka',
            'city' => 'Dhaka',
            'post_code' => 1207,
            'address' => 'Somewhere In The World',
            'phone' => '01954465596',
            'password' => \Illuminate\Support\Facades\Hash::make('123456'),
        ]);
    }
}
