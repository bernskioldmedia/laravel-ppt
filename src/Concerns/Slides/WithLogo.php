<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

use BernskioldMedia\LaravelPpt\Presentation\BaseSlide;

trait WithLogo
{
    public ?string $logo = null;

    public array $logoDimensions = [];

    public string $logoPosition = BaseSlide::EDGE_IMAGE_POSITION_BOTTOM_LEFT;

    public function logo(string $path, array $dimensions = [], string $position = BaseSlide::EDGE_IMAGE_POSITION_BOTTOM_LEFT): static
    {
        $this->logo = $path;
        $this->logoDimensions = $dimensions;
        $this->logoPosition = $position;

        return $this;
    }

    public function withoutLogo(): static
    {
        $this->logo = null;
        $this->logoDimensions = [];

        return $this;
    }
}
