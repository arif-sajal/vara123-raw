<?php

namespace App\Providers;

use App\Models\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('configs')):
            $configs = Config::all();
            foreach($configs as $config):
                \Config::set($config->key, $config->value);
            endforeach;
        endif;
       
    }
}
