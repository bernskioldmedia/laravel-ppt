<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

trait WithYAxis
{
    public string $yAxisTitle = '';

    public bool $showYAxis = true;

    public ?int $yAxisMax = 100;

    public ?int $yAxisMin = 0;

    public function yAxisTitle(string $title): static
    {
        $this->yAxisTitle = $title;

        return $this;
    }

    public function withYAxis(bool $shown = true): static
    {
        $this->showYAxis = $shown;

        return $this;
    }

    public function withoutYAxis(bool $hidden = true): static
    {
        $this->withYAxis(! $hidden);

        return $this;
    }

    public function yAxisAutoMax(): static
    {
        $this->yAxisMax = null;

        return $this;
    }

    public function yAxisMin(?int $max = 100): static
    {
        $this->yAxisMin = $max;

        return $this;
    }

    public function yAxisMax(?int $max = 100): static
    {
        $this->yAxisMax = $max;

        return $this;
    }
}
