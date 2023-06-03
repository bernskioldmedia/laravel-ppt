<?php

namespace BernskioldMedia\LaravelPpt\Branding;

use BernskioldMedia\LaravelPpt\Concerns\Makeable;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithBackgroundColor;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithBackgroundImage;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithChartBackground;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithLogo;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithTextColor;
use BernskioldMedia\LaravelPpt\Foundations\BaseSlide;

class SlideTheme
{
    use Makeable,
        WithBackgroundColor,
        WithBackgroundImage,
        WithChartBackground,
        WithTextColor,
        WithLogo;

    public ?string $customMasterSlide = null;

    public function customMasterSlide(string $className): self
    {
        $this->customMasterSlide = $className;

        return $this;
    }

    public function applyToSlide(BaseSlide $slide): void
    {
        if ($this->backgroundColor) {
            $slide->backgroundColor($this->backgroundColor);
        }

        if ($this->backgroundImage) {
            $slide->backgroundImage($this->backgroundImage);
        }

        if ($this->chartBackgroundColor) {
            $slide->chartBackgroundColor($this->chartBackgroundColor);
        }

        if ($this->textColor) {
            $slide->textColor($this->textColor);
        }

        if ($this->logo) {
            $slide->logo($this->logo, $this->logoDimensions);
        }
    }

}
