<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;


trait WithTextColor
{
    public ?string $textColor = null;

    public function textColor(string $argb): static
    {
        $this->textColor = $argb;

        return $this;
    }

}
