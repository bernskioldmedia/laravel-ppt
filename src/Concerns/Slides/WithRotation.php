<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

trait WithRotation
{
    protected int $rotation = 0;

    public function rotate(int $degrees = 0): static
    {
        $this->rotation = $degrees;

        return $this;
    }
}
