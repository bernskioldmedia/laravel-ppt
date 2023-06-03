<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

trait WithPadding
{
    public ?int $horizontalPadding = null;
    public ?int $verticalPadding = null;

    public function horizontalPadding(int $padding): self
    {
        $this->horizontalPadding = $padding;

        return $this;
    }

    public function verticalPadding(int $padding): self
    {
        $this->verticalPadding = $padding;

        return $this;
    }

    public function padding(int $x, int $y): self
    {
        return $this
            ->horizontalPadding($x)
            ->verticalPadding($y);
    }

}
