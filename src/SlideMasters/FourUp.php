<?php

namespace BernskioldMedia\LaravelPpt\SlideMasters;

use BernskioldMedia\LaravelPpt\Components\TextBox;
use BernskioldMedia\LaravelPpt\Concerns\Slides\HasBoxes;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithSlideTitle;
use BernskioldMedia\LaravelPpt\Presentation\BaseSlide;

class FourUp extends BaseSlide
{
    use HasBoxes,
        WithSlideTitle;

    public function __construct(
        string $title = '',
    )
    {
        $this->slideTitle = $title;
    }

    protected function render(): void
    {
        $this->renderTitle();

        $this->makeBoxes(1, 1, 1);
        $this->makeBoxes(2, 2, 1);
        $this->makeBoxes(3, 1, 2);
        $this->makeBoxes(4, 2, 2);
    }

    protected function makeBoxes(int $index, int $column = 1, int $row = 1): void
    {
        if (!isset($this->boxes[$index - 1])) {
            return;
        }

        $boxWidth = 550;
        $boxHeight = 300;
        $yOffset = $row === 1 ? 150 : $boxHeight + 40;
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
