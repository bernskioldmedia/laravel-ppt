<?php

namespace BernskioldMedia\LaravelPpt\Presentation;

use BernskioldMedia\LaravelPpt\Concerns\Makeable;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithBackgroundColor;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithBackgroundImage;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithChartBackground;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithEdgeImages;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithLogo;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithPadding;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithSize;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithTextColor;
use Closure;
use function file_exists;
use Illuminate\Support\Traits\Conditionable;
use PhpOffice\PhpPresentation\Slide;
use PhpOffice\PhpPresentation\Slide\Background\Color;
use function tap;

abstract class BaseSlide
{
    use Makeable,
        WithPadding,
        WithBackgroundColor,
        WithBackgroundImage,
        WithChartBackground,
        WithTextColor,
        WithEdgeImages,
        WithLogo,
        WithSize,
        Conditionable;

    public Presentation $presentation;

    public Slide $slide;

    public bool $withoutLogo = false;

    public string $footerText = '';

    protected ?Closure $modify = null;

    public function create(Presentation $presentation): Slide
    {
        $this->presentation = $presentation;
        $this->slide = $this->presentation->document->createSlide();

        $this->width = $this->presentation->width;
        $this->height = $this->presentation->height;

        $this->verticalPadding = $this->presentation->verticalPadding;
        $this->horizontalPadding = $this->presentation->horizontalPadding;

        // Apply slide theme.
        $theme = $this->presentation->branding->slideTheme(static::class);
        $theme->applyToSlide($this);

        // Apply slide-specific settings.
        $this->style();

        // Apply custom modifications.
        tap($this, $this->modify);

        // Render the contents.
        if ($theme->customMasterSlide) {
            ($theme->customMasterSlide)($this);
        } else {
            $this->render();
        }

        return $this->slide;
    }

    abstract protected function render(): void;

    protected function style(): void
    {
        $this->applyBackgroundColor();
        $this->applyBackgroundImage();
        $this->applyLogo();

        $this->applyEdgeImage('topRight');
        $this->applyEdgeImage('bottomRight');
        $this->applyEdgeImage('bottomLeft');
        $this->applyEdgeImage('topLeft');
    }

    public function modify(callable $function): static
    {
        $this->modify = $function;

        return $this;
    }

    public function withLogo(): self
    {
        $this->withoutLogo = false;

        return $this;
    }

    public function withoutLogo(): self
    {
        $this->withoutLogo = true;

        return $this;
    }

    public function withFooter(string $text): self
    {
        $this->footerText = $text;

        return $this;
    }

    protected function applyBackgroundColor(): void
    {
        $color = (new \PhpOffice\PhpPresentation\Style\Color($this->backgroundColor));
        $background = (new Color())->setColor($color);

        $this->slide->setBackground($background);
    }

    protected function applyBackgroundImage(): void
    {
        if ($this->backgroundImage === null) {
            return;
        }

        $background = (new Slide\Background\Image())->setPath($this->backgroundImage);
        $this->slide->setBackground($background);
    }

    protected function applyLogo(): void
    {
        if (true === $this->withoutLogo) {
            return;
        }

        if (! $this->logo) {
            return;
        }

        $shape = $this->slide->createDrawingShape();

        $shape->setName($this->presentation->branding->creatorCompanyName())
            ->setPath($this->maybeGetAssetFile($this->logo))
            ->setWidthAndHeight($this->logoDimensions['width'], $this->logoDimensions['height'])
            ->setOffsetX($this->horizontalPadding)
            ->setOffsetY($this->width - $this->logoDimensions['height'] - ($this->verticalPadding / 2));

        $shape->getHyperlink()
            ->setUrl($this->presentation->branding->url())
            ->setTooltip($this->presentation->branding->creatorCompanyName());
    }

    protected function maybeGetAssetFile(string $name): ?string
    {
        $fileWithoutExt = $this->presentation->branding->assetFolder().'/'.$name;

        if (file_exists("$fileWithoutExt.jpg")) {
            return "$fileWithoutExt.jpg";
        }

        if (file_exists("$fileWithoutExt.png")) {
            return "$fileWithoutExt.png";
        }

        return null;
    }

    protected function applyEdgeImage(string $key): void
    {
        $imagePath = $this->{"{$key}ImagePath"};
        $imageDimensions = $this->{"{$key}ImageDimensions"};
        $position = $this->{"{$key}ImagePosition"};

        if (! $imagePath) {
            return;
        }

        $x = $position['x'] ?? match ($key) {
            'topLeft', 'bottomLeft' => $this->horizontalPadding,
            'topRight', 'bottomRight' => $this->presentation->width - $imageDimensions['width'] - $this->horizontalPadding,
        };

        $y = $position['y'] ?? match ($key) {
            'topLeft', 'topRight' => $this->verticalPadding,
            'bottomLeft', 'bottomRight' => $this->presentation->height - $imageDimensions['height'] - $this->verticalPadding,
        };

        $this->slide->createDrawingShape()
            ->setPath($imagePath)
            ->setWidthAndHeight($imageDimensions['width'], $imageDimensions['height'])
            ->setOffsetX($x)
            ->setOffsetY($y);

    }
}
