<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Admin::class,10)->create();

        \App\Models\Admin::insert([
            'first_name' => 'John',
            'last_name' => 'Admin',
            'email' => 'admin@fakemail.com',
            'username' => 'admin',
            'password' => \Illuminate\Support\Facades\Hash::make('123456'),
        ]);
    }
}
