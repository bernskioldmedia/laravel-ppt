<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

use Closure;

trait WithCustomContents
{
    protected ?Closure $contents = null;

    public function content(?callable $callback = null): static
    {
        $this->contents = $callback();

        return $this;
    }

    protected function renderContents(): void
    {
        if ($this->contents) {
            $callback = $this->contents;
            $callback($this);
        }
    }
}
