<?php

namespace BernskioldMedia\LaravelPpt\Components;

use BernskioldMedia\LaravelPpt\Foundations\Component;

class BulletPointBox extends Component
{
    protected string $paragraphStyle = 'bulletPoint';

    protected string $bulletCharacter = '•';

    protected int $spacingAfter = 20;

    public function __construct(
        protected array $bulletPoints = [],
    ) {
    }

    public function bullet(string $text): self
    {
        $this->bulletPoints[] = $text;

        return $this;
    }

    public function paragraphStyle(string $style): self
    {
        $this->paragraphStyle = $style;

        return $this;
    }

    public function bulletCharacter(string $bulletCharacter): self
    {
        $this->bulletCharacter = $bulletCharacter;

        return $this;
    }

    public function spacingAfter(int $spacingAfter): self
    {
        $this->spacingAfter = $spacingAfter;

        return $this;
    }

    public function render(): static
    {
        $box = null;

        foreach ($this->bulletPoints as $bulletPoint) {
            if (! $box) {
                $box = TextBox::make($this->slide, $bulletPoint)
                    ->paragraphStyle($this->paragraphStyle)
                    ->height($this->height)
                    ->width($this->width)
                    ->position($this->x, $this->y)
                    ->render();
            } else {
                $box->text($bulletPoint);
            }

            $box->paragraphStyle($this->paragraphStyle)
                ->bulletCharacter($this->bulletCharacter)
                ->spacingAfter($this->spacingAfter)
                ->render();
        }

        return $this;
    }
}
