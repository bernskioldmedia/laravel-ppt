<?php

namespace BernskioldMedia\LaravelPpt\Components;

use BernskioldMedia\LaravelPpt\Concerns\Slides\WithPosition;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithSize;
use BernskioldMedia\LaravelPpt\Presentation\BaseSlide;
use Illuminate\Support\Traits\Conditionable;

abstract class Component
{
    use Conditionable,
        WithPosition,
        WithSize;

    public BaseSlide $slide;

    abstract public function render(): static;

    public static function make(BaseSlide $slide, ...$args): static
    {
        return (new static(...$args))->slide($slide)->initialize();
    }

    protected function initialize(): static
    {
        return $this;
    }

    public function slide(BaseSlide $slide): static
    {
        $this->slide = $slide;

        return $this;
    }

    public function centered(): static
    {
        $this->maybeDefaultDimensions();

        $this->centerHorizontally()
            ->centerVertically();

        return $this;
    }

    public function centerHorizontally(): static
    {
        $this->maybeDefaultDimensions();

        $this->x(($this->slide->presentation->width - $this->width) / 2);

        return $this;
    }

    public function centerVertically(): static
    {
        $this->maybeDefaultDimensions();

        $this->y(($this->slide->presentation->height / 2) - ($this->height / 2));

        return $this;
    }

    protected function defaultHeight(): float
    {
        return 580;
    }

    protected function defaultWidth(): float
    {
        return 1050;
    }

    protected function maybeDefaultDimensions(): void
    {
        if (! $this->width) {
            $this->width = $this->defaultWidth();
        }

        if (! $this->height) {
            $this->height = $this->defaultHeight();
        }
    }
}
