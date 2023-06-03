<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

trait WithSize
{

    public ?int $width = null;
    public ?int $height = null;

    public function width(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function height(int $height): self
    {
        $this->height = $height;

        return $this;
    }

}
