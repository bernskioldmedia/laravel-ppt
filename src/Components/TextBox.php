<?php

namespace BernskioldMedia\LaravelPpt\Components;

use BernskioldMedia\LaravelPpt\Concerns\Slides\WithAlignment;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithBackgroundColor;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithFontSettings;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithParagraphStyle;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithRotation;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithShape;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithUrl;
use PhpOffice\PhpPresentation\Shape\RichText\Run;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Font;

class TextBox extends Component
{
    use WithUrl,
        WithFontSettings,
        WithAlignment,
        WithRotation,
        WithBackgroundColor,
        WithShape,
        WithParagraphStyle;

    public ?Run $textRun = null;

    public int $lines = 2;

    public function __construct(
        protected ?string $text = '',
    )
    {
    }

    protected function initialize(): static
    {
        $this->shape = $this->slide->raw()->createRichTextShape();

        return $this;
    }

    public function render(): static
    {
        // Don't render if there is no text.
        if (empty($this->text)) {
            return $this;
        }

        // Apply the paragraph style if it exists.
        if (!empty($this->paragraphStyle)) {
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

        // Calculate a default height based on how many lines we have asked for.
        if (!$this->height) {
            $this->height = $this->size * $this->lines;
        }

        $this->shape->setWidth($this->width)
            ->setHeight($this->height)
            ->setOffsetX($this->x)
            ->setOffsetY($this->y)
            ->setRotation($this->rotation);

        if ($this->backgroundColor) {
            $this->shape->setFill($this->getBackgroundColorFill());
        }

        if (!$this->color) {
            $this->color = $this->slide->textColor;
        }

        if ($this->uppercase) {
            $this->text = strtoupper($this->text);
        }

        $this->textRun = $this->shape->createTextRun($this->text);

        $this->textRun->getFont()
            ->setName($this->font ?? $this->slide->presentation->branding->baseFont())
            ->setSize($this->size)
            ->setBold($this->bold)
            ->setUnderline($this->underlined ? Font::UNDERLINE_SINGLE : Font::UNDERLINE_NONE)
            ->setCharacterSpacing($this->letterSpacing)
            ->setColor(new Color($this->color));

        if ($this->url || $this->slideNumberAnchor) {
            $this->textRun->setHyperlink(
                $this->getLinkAsHyperlink()
            );
        }

        return $this;
    }

    public function lines(int $lines): static
    {
        $this->lines = $lines;

        return $this;
    }

}
