<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

trait WithPosition
{
    public float $x = 0;

    public float $y = 0;

    public function x(float $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function y(float $y): self
    {
        $this->y = $y;

        return $this;
    }

    public function position(float $x, float $y): self
    {
        $this->x($x);
        $this->y($y);

        return $this;
    }
}
