<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

use BernskioldMedia\LaravelPpt\Presentation\BaseSlide;

trait WithLogo
{
    public ?string $logo = null;

    public array $logoDimensions = [];

    public string $logoPosition = BaseSlide::EDGE_IMAGE_POSITION_BOTTOM_LEFT;

    public ?string $logoUrl = null;

    public function logo(string $path, array $dimensions = [], string $position = BaseSlide::EDGE_IMAGE_POSITION_BOTTOM_LEFT, ?string $url = null): static
    {
        $this->logo = $path;
        $this->logoDimensions = $dimensions;
        $this->logoPosition = $position;
        $this->logoUrl = $url;

        return $this;
    }

    public function withoutLogo(): static
    {
        $this->logo = null;
        $this->logoDimensions = [];
        $this->logoUrl = null;

        return $this;
    }
}
