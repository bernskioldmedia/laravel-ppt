<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

use BernskioldMedia\LaravelPpt\Branding\Branding;

trait WithLogo
{
    public ?string $logo = null;

    public array $logoDimensions = [];

    public string $logoPosition = Branding::LOGO_POSITION_TOP_LEFT;

    public function logo(string $path, array $dimensions = [], string $position = Branding::LOGO_POSITION_TOP_LEFT): static
    {
        $this->logo = $path;
        $this->logoDimensions = $dimensions;
        $this->logoPosition = $position;

        return $this;
    }
}
