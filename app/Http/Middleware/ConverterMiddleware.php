<?php

namespace App\Http\Middleware;

use App\Models\Currency;
use Cartalyst\Converter\Laravel\Facades\Converter;
use Closure;

class ConverterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currencies = Currency::all();
        $currencySetter = [];

        foreach ($currencies as $currency):
            $currencySetter[strtolower($currency->short_code)] = [
                'format' => sprintf($currency->format,$currency->symbol),
                'unit' => $currency->unit,
            ];
        endforeach;

        Converter::setMeasurements(['currency'=>$currencySetter]);
        return $next($request);
    }
}
