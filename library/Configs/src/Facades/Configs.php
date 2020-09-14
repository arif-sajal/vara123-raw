<?php

namespace Library\Configs\Facades;

use Illuminate\Support\Facades\Facade;

class Configs extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'configs';
    }
}
