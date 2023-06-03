<?php

namespace BernskioldMedia\LaravelPpt\SlideMasters;

use BernskioldMedia\LaravelPpt\Components\TextBox;
use BernskioldMedia\LaravelPpt\Concerns\Slides\HasBoxes;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithSlideTitle;
use BernskioldMedia\LaravelPpt\Presentation\BaseSlide;

class TwoUp extends BaseSlide
{
    use HasBoxes,
        WithSlideTitle;

    public function __construct(
        string $title = '',
    ) {
    }

    protected function render(): void
    {
        if (! empty($this->title)) {
            $this->renderTitle();
        }

        $this->makeBoxes(1, 1);
        $this->makeBoxes(2, 2);
    }

    protected function makeBoxes(int $index, int $column = 1): void
    {
        $boxWidth = 570;
        $yOffset = 150;
        $xOffset = $column === 1 ? 40 : $boxWidth + 80;

        $title = TextBox::make($this, $this->boxes[$index - 1]['title'])
            ->paragraphStyle('nUpGridTitle')
            ->width($boxWidth)
            ->position($xOffset, $yOffset)
            ->alignLeft()
            ->alignBottom()
            ->render();

        TextBox::make($this, $this->boxes[$index - 1]['description'])
            ->paragraphStyle('nUpGridBody')
            ->alignLeft()
            ->alignTop()
            ->width($boxWidth)
            ->position($xOffset, $yOffset + $title->height + 5)
            ->render();
    }
}
