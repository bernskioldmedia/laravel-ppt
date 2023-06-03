<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

trait HasBoxes
{

    protected array $boxes = [];

    public function box(int $index, string $title, string $description): static
    {
        $this->boxes[$index - 1]['title'] = $title;
        $this->boxes[$index - 1]['description'] = $description;

        return $this;
    }

    public function boxes(array $boxes): static
    {
        $this->boxes = $boxes;

        return $this;
    }

}
