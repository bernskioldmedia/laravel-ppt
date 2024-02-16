<?php

namespace BernskioldMedia\LaravelPpt\Presentation;

use BernskioldMedia\LaravelPpt\Concerns\Makeable;

/**
 * @method static BaseSlide make()
 */
abstract class PresentationSlide
{
    use Makeable;

    public function __construct()
    {
    }

    abstract public function __invoke(): BaseSlide;
}
