<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

trait WithParagraphStyle
{
    public ?string $paragraphStyle = null;

    public function paragraphStyle(string $paragraphStyle): static
    {
        $this->paragraphStyle = $paragraphStyle;

        return $this;
    }
}
