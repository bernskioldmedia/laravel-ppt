<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;


trait WithLogo
{
    public ?string $logo = null;
    public array $logoDimensions = [];

    public function logo(string $fileName, array $dimensions = []): static
    {
        $this->logo = $fileName;
        $this->logoDimensions = $dimensions;

        return $this;
    }

}
