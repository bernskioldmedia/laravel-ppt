<?php

namespace BernskioldMedia\LaravelPpt\SlideMasters;

use BernskioldMedia\LaravelPpt\Components\TextBox;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithCustomContents;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithSlideTitle;
use BernskioldMedia\LaravelPpt\Presentation\BaseSlide;
use function config;

class BlankWithTitleSubtitle extends BaseSlide
{
    use WithCustomContents,
        WithSlideTitle;

    public function __construct(
        protected string $title,
        protected string $subtitle,
        ?callable $callback = null
    ) {
        $this->contents = $callback;
    }

    protected function render(): void
    {
        $this->renderContents();

        $title = $this->renderTitle();

        TextBox::make($this, $this->subtitle)
            ->paragraphStyle(config('ppt.defaults.masters.slideSubtitleParagraphStyle', 'slideSubtitle'))
            ->alignLeft()
            ->position($this->horizontalPadding, $this->verticalPadding + 10 + $title->height)
            ->width($this->presentation->width - (2 * $this->horizontalPadding))
            ->lines(1)
            ->render();
    }
}
