<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

trait WithXAxis
{
    public bool $showXAxis = true;

    public string $xAxisTitle = '';

    public function xAxisTitle(string $title): static
    {
        $this->xAxisTitle = $title;

        return $this;
    }

    public function withXAxis(bool $shown = true): static
    {
        $this->showXAxis = $shown;

        return $this;
    }

    public function withoutXAxis(bool $hidden = true): static
    {
        $this->withXAxis(! $hidden);

        return $this;
    }
}
