<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

use BernskioldMedia\LaravelPpt\Branding\Branding;
use BernskioldMedia\LaravelPpt\Presentation\BaseSlide;

trait WithLogo
{
    public ?string $logo = null;

    public array $logoDimensions = [];

    public string $logoPosition = BaseSlide::EDGE_IMAGE_POSITION_TOP_LEFT;

    public function logo(string $path, array $dimensions = [], string $position = BaseSlide::EDGE_IMAGE_POSITION_TOP_LEFT): static
    {
        $this->logo = $path;
        $this->logoDimensions = $dimensions;
        $this->logoPosition = $position;

        return $this;
    }
}
