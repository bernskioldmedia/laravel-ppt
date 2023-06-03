<?php

namespace BernskioldMedia\LaravelPpt\Components\Charts;

use BernskioldMedia\LaravelPpt\Components\ChartComponent;
use PhpOffice\PhpPresentation\Shape\Chart\Marker;
use PhpOffice\PhpPresentation\Shape\Chart\Series;
use PhpOffice\PhpPresentation\Style\Fill;

class Scatter extends ChartComponent
{
    protected function initializeChart(): void
    {
        $this->chart = new \PhpOffice\PhpPresentation\Shape\Chart\Type\Scatter();
    }

    protected function chartTypeSeriesData(Series $series, int $index, array $seriesData): void
    {
        $series->getFont()
            ->setName($this->slide->presentation->branding->baseFont())
            ->setColor($this->slide->presentation->branding->getChartColor(0))
            ->setBold(true);

        $series->getMarker()->setSymbol(Marker::SYMBOL_CIRCLE);
        $series->getMarker()->setSize(10);
        $series->getMarker()
            ->getBorder()
            ->getColor()
            ->setARGB('ffffffff');

        $series->getMarker()
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->setStartColor($this->slide->presentation->branding->getChartColor(0))
            ->setEndColor($this->slide->presentation->branding->getChartColor(0));
    }

    public function render(): static
    {
        return $this;
    }
}
