<?php

namespace BernskioldMedia\LaravelPpt\Components\Charts;

use BernskioldMedia\LaravelPpt\Foundations\ChartComponent;

class Bar extends ChartComponent
{
    protected bool $stacked = false;

    protected bool $percentageStacked = false;

    protected function initializeChart(): void
    {
        $this->chart = new \PhpOffice\PhpPresentation\Shape\Chart\Type\Bar();
    }

    public function stacked(bool $stacked = true): static
    {
        $this->stacked = $stacked;

        return $this;
    }

    public function percentageStacked(bool $stacked = true): static
    {
        $this->percentageStacked = $stacked;

        return $this;
    }

    public function render(): static
    {
        $this->chart->setGapWidthPercent(50);

        if ($this->stacked) {
            $this->chart->setBarGrouping(\PhpOffice\PhpPresentation\Shape\Chart\Type\Bar::GROUPING_STACKED);
        }

        if ($this->percentageStacked) {
            $this->chart->setBarGrouping(\PhpOffice\PhpPresentation\Shape\Chart\Type\Bar::GROUPING_PERCENTSTACKED);
        }

        return $this;
    }
}
