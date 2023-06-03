<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;


trait WithChartBackground
{
    public ?string $chartBackgroundColor = null;

    public function chartBackgroundColor(string $argb): static
    {
        $this->chartBackgroundColor = $argb;

        return $this;
    }

}
