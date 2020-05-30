<?php

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configs = [
            ['key'=>'default_currency','value'=>1,'type'=>'relation','related'=>\App\Models\Currency::class],
            ['key'=>'default_user_avatar','value'=>'system/default_user_avatar.png','type'=>'file','related'=>'']
        ];

        \App\Models\Config::insert($configs);
    }
}
