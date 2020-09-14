<?php

namespace App\Providers;

use App\Models\Config;
use App\Models\Currency;
use Cartalyst\Converter\Laravel\Facades\Converter;
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

        if(Schema::hasTable('currencies')):
            $currencies = Currency::all();
            $cs = [];
            foreach($currencies as $currency):
                $cs[$currency->short_code] = [
                    'format' => sprintf($currency->format,$currency->symbol),
                    'unit'   => $currency->unit,
                ];
            endforeach;
            Converter::setMeasurements(['currency'=>$cs]);
        endif;

    }
}
