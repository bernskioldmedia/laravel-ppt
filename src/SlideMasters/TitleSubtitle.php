<?php

namespace BernskioldMedia\LaravelPpt\SlideMasters;

use BernskioldMedia\LaravelPpt\Components\TextBox;
use BernskioldMedia\LaravelPpt\Presentation\BaseSlide;
use PhpOffice\PhpPresentation\Style\Alignment;

class TitleSubtitle extends BaseSlide
{
    public function __construct(
        public string $title,
        public string $subtitle,
    )
    {
    }

    protected function render(): void
    {
        $title = TextBox::make($this, $this->title)
            ->paragraphStyle('sectionTitle')
            ->alignBottom()
            ->y(($this->presentation->height / 2) - ($this->presentation->branding->paragraphStyleValue('sectionTitle', 'size') * 1.1))
            ->centerHorizontally()
            ->render();

        TextBox::make($this, $this->subtitle)
            ->paragraphStyle('sectionSubtitle')
            ->alignTop()
            ->lines(1)
            ->y(($this->presentation->height / 2) + $title->height + 20)
            ->centerHorizontally()
            ->render();
    }
}
