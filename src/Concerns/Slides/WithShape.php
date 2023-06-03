<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

use PhpOffice\PhpPresentation\AbstractShape;

trait WithShape
{
    public ?AbstractShape $shape = null;

    public function modify(callable $callback): static
    {
        $callback($this->shape);

        return $this;
    }
}
