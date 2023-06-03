<?php

namespace BernskioldMedia\LaravelPpt\SlideMasters;

use BernskioldMedia\LaravelPpt\Concerns\Slides\WithCustomContents;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithSlideTitle;
use BernskioldMedia\LaravelPpt\Presentation\BaseSlide;

class BlankWithTitle extends BaseSlide
{
    use WithCustomContents,
        WithSlideTitle;

    public function __construct(
        string $title,
        ?callable $callback = null
    ) {
        $this->title($title);
        $this->contents = $callback;
    }

    protected function render(): void
    {
        $this->renderContents();
        $this->renderTitle();
    }
}
