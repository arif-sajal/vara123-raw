<?php

namespace App\Http\Middleware;

use App\Models\Config;
use Closure;

class ConfigMiddleware
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
        $configs = Config::all();

        foreach ($configs as $config):
            config()->set($config->key,$config->format());
        endforeach;

        return $next($request);
    }
}
