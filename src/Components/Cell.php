<?php

namespace BernskioldMedia\LaravelPpt\Components;

use BernskioldMedia\LaravelPpt\Concerns\Makeable;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithFontSettings;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithUrl;

class Cell
{
    use Makeable,
        WithFontSettings,
        WithUrl;

    public int $colspan = 0;

    public int $rowspan = 0;

    public int $width = 0;

    public function __construct(
        public string $text = ''
    ) {
    }

    public function spansColumns(int $colspan): self
    {
        $this->colspan = $colspan;

        return $this;
    }

    public function spansRows(int $rowspan): self
    {
        $this->rowspan = $rowspan;

        return $this;
    }

    public function spans(int $columns, int $rows = 0): self
    {
        return $this->spansColumns($columns)
            ->spansRows($rows);
    }

    public function width(int $width): self
    {
        $this->width = $width;

        return $this;
    }
}
