<?php

namespace BernskioldMedia\LaravelPpt\SlideMasters;

use BernskioldMedia\LaravelPpt\Concerns\Slides\WithCustomContents;
use BernskioldMedia\LaravelPpt\Presentation\BaseSlide;

/**
 * @method static static make(callable $callback)
 */
class Blank extends BaseSlide
{
    use WithCustomContents;

    public function __construct(callable $callback)
    {
        $this->contents = $callback;
    }

    protected function render(): void
    {
        $this->renderContents();
    }
}
