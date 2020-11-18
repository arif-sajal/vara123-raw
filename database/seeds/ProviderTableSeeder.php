<?php

use Illuminate\Database\Seeder;

class ProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Provider::class,10)->create();

        \App\Models\Provider::insert([
            'first_name' => 'John',
            'last_name' => 'Provider',
            'email' => 'provider@fakemail.com',
            'currency_id' => rand(1,2),
            'username' => 'provider',
            'password' => \Illuminate\Support\Facades\Hash::make('123456'),
        ]);
    }
}
