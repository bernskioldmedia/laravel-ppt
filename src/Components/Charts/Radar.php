<?php

namespace BernskioldMedia\LaravelPpt\Components\Charts;

use BernskioldMedia\LaravelPpt\Foundations\ChartComponent;
use PhpOffice\PhpPresentation\Shape\Chart\Series;
use PhpOffice\PhpPresentation\Style\Color;

class Radar extends ChartComponent
{
    protected function initializeChart(): void
    {
        $this->chart = new \PhpOffice\PhpPresentation\Shape\Chart\Type\Radar();
        $this->withoutDataValues();
    }

    protected function chartTypeSeriesData(Series $series, int $index, array $seriesData): void
    {
        $series->getFont()
            ->setName($this->slide->presentation->branding->baseFont())
            ->setColor(new Color('ff000000'))
            ->setBold(true);
    }

    public function render(): static
    {
        return $this;
    }
}
