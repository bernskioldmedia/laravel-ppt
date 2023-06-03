<?php

namespace BernskioldMedia\LaravelPpt\Components\Charts;

use BernskioldMedia\LaravelPpt\Components\ChartComponent;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithLegend;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithXAxis;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithYAxis;
use PhpOffice\PhpPresentation\Shape\Chart\Marker;
use PhpOffice\PhpPresentation\Shape\Chart\Series;
use PhpOffice\PhpPresentation\Style\Fill;

class Line extends ChartComponent
{
    use WithYAxis,
        WithXAxis,
        WithLegend;

    public bool $smooth = false;

    protected function initializeChart(): void
    {
        $this->chart = new \PhpOffice\PhpPresentation\Shape\Chart\Type\Line();
        $this->withoutDataValues();
    }

    protected function chartTypeSeriesData(Series $series, int $index, array $seriesData): void
    {
        $seriesColor = $this->getSeriesColorFromData($seriesData, $index);

        $series->getFont()
            ->setName($this->slide->presentation->branding->baseFont())
            ->setColor($seriesColor)
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
            ->setStartColor($seriesColor)
            ->setEndColor($seriesColor);
    }

    public function smooth(bool $smooth = true): self
    {
        $this->smooth = $smooth;

        return $this;
    }

    public function render(): static
    {
        $this->chart->setIsSmooth($this->smooth);

        return $this;
    }
}
