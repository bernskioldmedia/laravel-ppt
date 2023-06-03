<?php

namespace BernskioldMedia\LaravelPpt\Concerns;

trait Makeable
{

    public static function make(...$arguments)
    {
        return new static(...$arguments);
    }

}
