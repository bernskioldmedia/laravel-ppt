<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

trait WithBackgroundImage
{
    public ?string $backgroundImage = null;

    public function backgroundImage(?string $path, bool $isFullPath = false): static
    {
        if ($path === null) {
            $this->backgroundImage = null;

            return $this;
        }

        if (! $isFullPath) {
            $path = config('powerpoint.paths.base').'/'.$path;
        }

        $this->backgroundImage = $path;

        return $this;
    }
}
