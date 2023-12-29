<?php

namespace BernskioldMedia\LaravelPpt\SlideMasters;

use BernskioldMedia\LaravelPpt\Components\TextBox;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithCustomContents;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithSlideTitle;
use BernskioldMedia\LaravelPpt\Presentation\BaseSlide;
use function config;

/**
 * @method static static make(string $title, string $subtitle, ?callable $callback = null)
 */
class BlankWithTitleSubtitle extends BaseSlide
{
    use WithCustomContents,
        WithSlideTitle;

    protected ?string $subtitle = null;

    public function __construct(
        string $title,
        string $subtitle,
        ?callable $callback = null
    ) {
        $this->slideTitle = $title;
        $this->subtitle = $subtitle;
        $this->contents = $callback;
    }

    protected function render(): void
    {
        $this->renderContents();

        $title = $this->renderTitle();

        TextBox::make($this, $this->subtitle)
            ->paragraphStyle(config('powerpoint.defaults.masters.slideSubtitleParagraphStyle', 'slideSubtitle'))
            ->alignLeft()
            ->position($this->horizontalPadding, $this->verticalPadding + 15 + $title->height)
            ->width($this->presentation->width - (2 * $this->horizontalPadding))
            ->lines(1)
            ->render();
    }
}
