<?php

namespace BernskioldMedia\LaravelPpt\SlideMasters;

use BernskioldMedia\LaravelPpt\Components\ChartComponent;
use BernskioldMedia\LaravelPpt\Components\ChartShape;
use BernskioldMedia\LaravelPpt\Presentation\BaseSlide;

class Chart extends BaseSlide
{
    public function __construct(
        protected ChartComponent $chart
    )
    {
    }

    protected function render(): void
    {
        ChartShape::make($this, $this->chart->slide($this)->get())
            ->centered()
            ->backgroundColor($this->chartBackgroundColor)
            ->y($this->verticalPadding)
            ->render();
    }
}
