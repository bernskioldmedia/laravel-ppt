<?php

namespace BernskioldMedia\LaravelPpt\Presentation;

use BernskioldMedia\LaravelPpt\Branding\Branding;
use BernskioldMedia\LaravelPpt\Concerns\Makeable;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithPadding;
use BernskioldMedia\LaravelPpt\Concerns\Slides\WithSize;
use BernskioldMedia\LaravelPpt\Contracts\CustomizesPowerpointBranding;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpPresentation\DocumentLayout;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\PhpPresentation;
use function config;
use function method_exists;

class Presentation
{
    use Makeable,
        WithPadding,
        WithSize;

    public PhpPresentation $document;
    protected ?Model $user = null;
    public ?Branding $branding = null;

    public function __construct(
        protected string $title,
        ?int             $width = null,
        ?int             $height = null,
        ?string          $branding = null
    )
    {
        $this->user = auth()->user();

        // Set default sizes.
        $this->width = $width ?? config('ppt.defaults.presentation.width', 1280);
        $this->height = $height ?? config('ppt.defaults.presentation.height', 720);

        // Set default padding.
        $this->verticalPadding = config('ppt.defaults.presentation.verticalPadding', 0);
        $this->horizontalPadding = config('ppt.defaults.presentation.horizontalPadding', 0);

        // Create the presentation instance.
        $this->document = new PhpPresentation();

        // Remove the first slide which PHP-Presentation creates by default.
        $this->document->removeSlideByIndex(0);

        // Set the default branding.
        if ($branding) {
            $this->branding($branding);
        } elseif ($this->user instanceof CustomizesPowerpointBranding && class_exists($this->user->powerpointBrandingClass())) {
            $this->branding($this->user->powerpointBrandingClass());
        } else {
            $this->branding(config('ppt.defaults.presentation.branding', Branding::class));
        }
    }

    public function create(): static
    {

        // Set the size.
        $this->document->getLayout()
            ->setCX($this->width, DocumentLayout::UNIT_PIXEL)
            ->setCY($this->height, DocumentLayout::UNIT_PIXEL);

        $this->saveProperties();

        return $this;
    }

    public function save(string $filename, ?string $disk = null): string
    {
        if (!$disk) {
            $disk = config('ppt.output.disk', 'local');
        }

        $directory = config('ppt.output.directory', 'ppt');

        Storage::disk($disk)->makeDirectory($directory);
        $path = Storage::disk($disk)->path("$directory/$filename.pptx");

        $writer = IOFactory::createWriter($this->ppt);
        $writer->save($path);

        return $path;
    }

    public function width(int $width): static
    {
        $this->width = $width;

        return $this;
    }

    public function height(int $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function branding(string $brandingClass): static
    {
        $this->branding = $brandingClass::make();

        return $this;
    }

    public function forUser(Model $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function hasBranding(): bool
    {
        return $this->branding !== null;
    }

    protected function saveProperties(): void
    {
        $this->document
            ->getDocumentProperties()
            ->setTitle($this->title)
            ->setCreator($this->branding->creatorCompanyName())
            ->setCompany($this->branding->creatorCompanyName())
            ->setLastModifiedBy($this->branding->creatorCompanyName());

        if ($this->user && method_exists($this->user, 'powerpointCreatorName')) {
            $this->document->getDocumentProperties()->setCreator($this->user->powerpointCreatorName());
        }

        if ($this->user && method_exists($this->user, 'powerpointCompanyName')) {
            $this->document->getDocumentProperties()->setCompany($this->user->powerpointCompanyName());
        }

    }

}
