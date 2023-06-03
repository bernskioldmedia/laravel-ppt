<?php

namespace BernskioldMedia\LaravelPpt\Components;

use BernskioldMedia\LaravelPpt\Concerns\Slides\WithBackgroundColor;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithBorder;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithRotation;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithShape;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithUrl;
use PhpOffice\PhpPresentation\Shape\AutoShape;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Fill;

class Shape extends Component
{
    use WithUrl,
        WithRotation,
        WithBackgroundColor,
        WithShape,
        WithBorder;

    protected string $type = AutoShape::TYPE_RECTANGLE;

    public function __construct()
    {
    }

    protected function initialize(): static
    {
        $this->shape = new AutoShape();

        return $this;
    }

    public function type(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function round(): static
    {
        return $this->type(AutoShape::TYPE_OVAL);
    }

    public function rounded(): static
    {
        return $this->type(AutoShape::TYPE_ROUNDED_RECTANGLE);
    }

    public function render(): static
    {
        $this->shape
            ->setWidth($this->width)
            ->setHeight($this->height)
            ->setOffsetX($this->x)
            ->setOffsetY($this->y)
            ->setType($this->type);

        if ($this->backgroundColor) {
            $this->shape->setFill(
                (new Fill())->setFillType(Fill::FILL_SOLID)
                    ->setStartColor(new Color($this->backgroundColor))
                    ->setEndColor(new Color($this->backgroundColor))
            );
        }

        if ($this->url) {
            $this->shape->setHyperlink($this->getLinkAsHyperlink());
        }

        if ($this->borderColor) {
            $this->shape->setOutline($this->getBorderAsOutline());
        }

        $this->shape->setRotation($this->rotation);

        $this->slide->raw()->addShape($this->shape);

        return $this;
    }
}
