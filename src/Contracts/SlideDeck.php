<?php

namespace BernskioldMedia\LaravelPpt\Contracts;

use BernskioldMedia\LaravelPpt\Presentation\Presentation;

interface SlideDeck
{
    public function create(): Presentation;
}
