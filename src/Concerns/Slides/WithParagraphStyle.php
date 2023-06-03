<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

use PhpOffice\PhpPresentation\AbstractShape;

trait WithParagraphStyle
{
    public ?string $paragraphStyle = null;

    public function paragraphStyle(string $paragraphStyle): static
    {
        $this->paragraphStyle = $paragraphStyle;

        return $this;
    }

}
