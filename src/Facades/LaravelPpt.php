<?php

namespace BernskioldMedia\LaravelPpt\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BernskioldMedia\LaravelPpt\LaravelPpt
 */
class LaravelPpt extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \BernskioldMedia\LaravelPpt\LaravelPpt::class;
    }
}
