<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

trait WithLegend
{

    public bool $showLegend = true;

    public function withLegend(bool $showLegend = true): static
    {
        $this->showLegend = $showLegend;

        return $this;
    }

    public function withoutLegend(bool $hideLegend = true): static
    {
        $this->withLegend(!$hideLegend);

        return $this;
    }

}
