<?php

namespace BernskioldMedia\LaravelPpt\Components\Charts;

class Column extends Bar
{
    public function render(): static
    {
        $this->chart->setBarDirection(\PhpOffice\PhpPresentation\Shape\Chart\Type\Bar::DIRECTION_HORIZONTAL);

        return parent::render();
    }
}
