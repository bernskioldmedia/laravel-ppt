<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

trait WithBackgroundImage
{
    public ?string $backgroundImage = null;

    public function backgroundImage(?string $path, bool $isFull = false): static
    {
        if ($path === null) {
            $this->backgroundImage = null;

            return $this;
        }

        if (! $isFull) {
            $path = config('powerpoint.paths.base').'/'.$path;
        }

        $this->backgroundImage = $path;

        return $this;
    }
}
