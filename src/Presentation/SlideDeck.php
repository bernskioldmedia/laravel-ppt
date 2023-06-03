<?php

namespace BernskioldMedia\LaravelPpt\Presentation;

abstract class SlideDeck
{
    abstract public function create(): Presentation;
}
