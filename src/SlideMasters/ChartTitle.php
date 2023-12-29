<?php

namespace BernskioldMedia\LaravelPpt\SlideMasters;

use BernskioldMedia\LaravelPpt\Components\ChartComponent;
use BernskioldMedia\LaravelPpt\Components\ChartShape;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithSlideTitle;
use BernskioldMedia\LaravelPpt\Presentation\BaseSlide;

/**
 * @method static static make(string $title, ChartComponent $chart)
 */
class ChartTitle extends BaseSlide
{
    use WithSlideTitle;

    public function __construct(
        string $title,
        protected ChartComponent $chart,
    ) {
        $this->title($title);
    }

    protected function render(): void
    {
        $title = $this->renderTitle();

        ChartShape::make($this, $this->chart->slide($this)->get())
            ->height($this->presentation->height - $title->height - $this->verticalPadding * 2 - 20)
            ->width($this->presentation->width - $this->horizontalPadding * 2)
            ->centerHorizontally()
            ->backgroundColor($this->chartBackgroundColor)
            ->y($title->height + $this->verticalPadding + 20)
            ->render();

    }
}
