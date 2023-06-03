<?php

namespace BernskioldMedia\LaravelPpt\Components;

use BernskioldMedia\LaravelPpt\Concerns\Slides\WithAlignment;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithBackgroundColor;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithFontSettings;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithRotation;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithShape;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithUrl;

class MultiTextBox extends Component
{
    use WithUrl,
        WithFontSettings,
        WithAlignment,
        WithRotation,
        WithBackgroundColor,
        WithShape;

    public function __construct(
        protected ?array $texts = []
    ) {
    }

    protected function initialize(): static
    {
        $this->shape = $this->slide->raw()->createRichTextShape();

        return $this;
    }

    public function texts(array $texts): self
    {
        $this->texts = $texts;

        return $this;
    }

    public function render(): static
    {
        if (empty($this->texts)) {
            return $this;
        }

        $this->maybeDefaultDimensions();

        // Apply the paragraph style if it exists.
        if (! empty($this->paragraphStyle)) {
            $this->slide
                ->presentation
                ->branding
                ->paragraphStyle($this->paragraphStyle)
                ?->applyToComponent($this);
        }

        $this->shape->getActiveParagraph()
            ->setLineSpacing($this->lineHeight)
            ->getAlignment()
            ->setHorizontal($this->horizontalAlignment)
            ->setVertical($this->verticalAlignment);

        $height = $this->height ?? $this->defaultHeight();

        $this->shape->setWidthAndHeight($this->width, $height)
            ->setOffsetX($this->x)
            ->setOffsetY($this->y);

        if ($this->backgroundColor) {
            $this->shape->setFill($this->getBackgroundColorFill());
        }

        if ($this->url || $this->slideNumberAnchor) {
            $this->shape->setHyperlink($this->getLinkAsHyperlink());
        }

        $this->shape->setRotation($this->rotation);

        if (! $this->color) {
            $this->color = $this->slide->textColor;
        }

        foreach ($this->texts as $text) {
            $this->shape->addText(
                $text->toTextRun($this)
            );
        }

        return $this;
    }
}
