<?php

namespace BernskioldMedia\LaravelPpt\Concerns\Slides;

trait WithEdgeImages
{
    protected ?string $bottomLeftImagePath = null;

    protected ?string $bottomRightImagePath = null;

    protected ?string $topRightImagePath = null;

    protected ?string $topLeftImagePath = null;

    protected array $bottomLeftImageDimensions = [];

    protected array $bottomRightImageDimensions = [];

    protected array $topRightImageDimensions = [];

    protected array $topLeftImageDimensions = [];

    protected array $bottomLeftImagePosition = [];

    protected array $bottomRightImagePosition = [];

    protected array $topRightImagePosition = [];

    protected array $topLeftImagePosition = [];

    public function bottomLeftImage(string $path, int $width, int $height, ?int $x = null, ?int $y = null): self
    {
        $this->bottomLeftImagePath = $path;
        $this->bottomLeftImageDimensions = ['width' => $width, 'height' => $height];

        if ($x) {
            $this->bottomLeftImagePosition['x'] = $x;
        }

        if ($y) {
            $this->bottomLeftImagePosition['y'] = $y;
        }

        return $this;
    }

    public function bottomRightImage(string $path, int $width, int $height, ?int $x = null, ?int $y = null): self
    {
        $this->bottomRightImagePath = $path;
        $this->bottomRightImageDimensions = ['width' => $width, 'height' => $height];

        if ($x) {
            $this->bottomRightImagePosition['x'] = $x;
        }

        if ($y) {
            $this->bottomRightImagePosition['y'] = $y;
        }

        return $this;
    }

    public function topLeftImage(string $path, int $width, int $height, ?int $x = null, ?int $y = null): self
    {
        $this->topLeftImagePath = $path;
        $this->topLeftImageDimensions = ['width' => $width, 'height' => $height];

        if ($x) {
            $this->topLeftImagePosition['x'] = $x;
        }

        if ($y) {
            $this->topLeftImagePosition['y'] = $y;
        }

        return $this;
    }

    public function topRightImage(string $path, int $width, int $height, ?int $x = null, ?int $y = null): self
    {
        $this->topRightImagePath = $path;
        $this->topRightImageDimensions = ['width' => $width, 'height' => $height];

        if ($x) {
            $this->topRightImagePosition['x'] = $x;
        }

        if ($y) {
            $this->topRightImagePosition['y'] = $y;
        }

        return $this;
    }
}
