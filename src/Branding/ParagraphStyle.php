<?php

namespace BernskioldMedia\LaravelPpt\Branding;

use BernskioldMedia\LaravelPpt\Components\Component;
use BernskioldMedia\LaravelPpt\Concerns\Makeable;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithFontSettings;
use Illuminate\Contracts\Support\Arrayable;
use function method_exists;

class ParagraphStyle implements Arrayable
{
    use Makeable,
        WithFontSettings;

    public string $key;

    public function __construct(string $key)
    {
    }

    public function toArray()
    {
        return [
            'key' => $this->key,
            'settings' => [
                'size' => $this->size,
                'color' => $this->color,
                'letterSpacing' => $this->letterSpacing,
                'font' => $this->font,
                'bold' => $this->bold,
                'underlined' => $this->underlined,
                'lineHeight' => $this->lineHeight,
                'uppercase' => $this->uppercase,
            ],
        ];
    }

    public function applyToComponent(Component $component): void
    {
        if ($this->size && method_exists($component, 'size')) {
            $component->size($this->size);
        }

        if ($this->color && method_exists($component, 'color')) {
            $component->color($this->color);
        }

        if ($this->letterSpacing && method_exists($component, 'letterSpacing')) {
            $component->letterSpacing($this->letterSpacing);
        }

        if ($this->font && method_exists($component, 'font')) {
            $component->font($this->font);
        }

        if ($this->bold && method_exists($component, 'bold')) {
            $component->bold($this->bold);
        }

        if ($this->underlined && method_exists($component, 'underlined')) {
            $component->underlined($this->underlined);
        }

        if ($this->lineHeight && method_exists($component, 'lineHeight')) {
            $component->lineHeight($this->lineHeight);
        }

        if ($this->uppercase && method_exists($component, 'uppercase')) {
            $component->uppercase($this->uppercase);
        }
    }
}
