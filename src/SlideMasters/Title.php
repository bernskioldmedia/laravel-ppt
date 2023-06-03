<?php

namespace BernskioldMedia\LaravelPpt\SlideMasters;

use BernskioldMedia\LaravelPpt\Components\TextBox;
use BernskioldMedia\LaravelPpt\Presentation\BaseSlide;
use PhpOffice\PhpPresentation\Style\Alignment;

class Title extends BaseSlide
{

    public function __construct(
        protected string $title = ''
    )
    {
    }

    protected function render(): void
    {
        TextBox::make($this, $this->title)
            ->paragraphStyle('sectionTitle')
            ->centered()
            ->width($this->presentation->width - $this->horizontalPadding * 2)
            ->lines(1)
            ->position($this->horizontalPadding, $this->verticalPadding)
            ->render();
    }
}
