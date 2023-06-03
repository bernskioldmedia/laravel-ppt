<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

use BernskioldMedia\LaravelPpt\Components\TextBox;

trait WithSlideTitle
{
    protected string $slideTitle = '';

    protected ?string $overridenTitleColor = null;

    protected ?string $overridenTitleSize = null;

    public function title(string $title): static
    {
        $this->slideTitle = $title;

        return $this;
    }

    public function titleColor(string $color): self
    {
        $this->overridenTitleColor = $color;

        return $this;
    }

    public function slideTitleSize(int $size): self
    {
        $this->overridenTitleSize = $size;

        return $this;
    }

    protected function renderTitle(): TextBox
    {
        $title = TextBox::make($this, $this->slideTitle)
            ->paragraphStyle(config('powerpoint.defaults.masters.slideTitleParagraphStyle', 'slideTitle'))
            ->alignLeft()
            ->position($this->horizontalPadding, $this->verticalPadding)
            ->width($this->presentation->width - (2 * $this->horizontalPadding))
            ->lines(1)
            ->when($this->overridenTitleSize, fn (TextBox $box) => $box->size($this->overridenTitleSize))
            ->when($this->overridenTitleColor, fn (TextBox $box) => $box->color($this->overridenTitleColor));

        return $title->render();
    }
}
