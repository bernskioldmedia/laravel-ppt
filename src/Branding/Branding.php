<?php

namespace BernskioldMedia\LaravelPpt\Branding;

use function array_filter;
use function array_merge;
use BernskioldMedia\LaravelPpt\Concerns\Makeable;
use Illuminate\Support\Str;
use PhpOffice\PhpPresentation\Style\Color;
use ReflectionClass;
use function collect;
use function resource_path;

class Branding
{
    use Makeable;

    public const LOGO_POSITION_TOP_LEFT = 'top-left';

    public const LOGO_POSITION_TOP_RIGHT = 'top-right';

    public const LOGO_POSITION_BOTTOM_LEFT = 'bottom-left';

    public const LOGO_POSITION_BOTTOM_RIGHT = 'bottom-right';

    protected string $creatorCompanyName;

    protected string $websiteUrl;

    protected string $baseFont;

    protected array $chartColors = [];

    protected array $defaultChartColors = [];

    public function __construct()
    {
        $this->baseFont = config('powerpoint.baseBranding.font', 'Calibri');
        $this->creatorCompanyName = config('powerpoint.baseBranding.creatorCompanyName', '');
        $this->websiteUrl = config('powerpoint.baseBranding.websiteUrl', '#');
        $this->defaultChartColors = config('powerpoint.baseBranding.chartColors', 'ff000000');
    }

    public function url(): string
    {
        return $this->websiteUrl;
    }

    public function creatorCompanyName(): string
    {
        return $this->creatorCompanyName;
    }

    public function baseFont(): string
    {
        return $this->baseFont;
    }

    public function chartColors(): array
    {
        return $this->chartColors;
    }

    public function assetFolder(): string
    {
        return resource_path("powerpoint/branding/{$this->key()}");
    }

    public function logoDimensions(): array
    {
        return [
            'width' => 0,
            'height' => 0,
        ];
    }

    public function logoPosition(): string
    {
        return self::LOGO_POSITION_TOP_LEFT;
    }

    public function key(): string
    {
        return Str::kebab((new ReflectionClass($this))->getShortName());
    }

    public function defaultTheme(): SlideTheme
    {
        return SlideTheme::make()
            ->backgroundColor('ffffffff')
            ->chartBackgroundColor('ffffffff')
            ->textColor('ff000000');
    }

    public function slideTheme(?string $slideClass = null): SlideTheme
    {
        return $this->defaultTheme();
    }

    protected function paragraphStyles(): array
    {
        return [];
    }

    protected function defaultParagraphStyles(): array
    {
        return [
            ParagraphStyle::make('slideTitle')
                ->size(24)
                ->bold(),
            ParagraphStyle::make('slideSubtitle')
                ->size(18)
                ->bold(),
            ParagraphStyle::make('bulletPoint')
                ->size(18),
            ParagraphStyle::make('nUpGridTitle')
                ->size(16)
                ->bold(),
            ParagraphStyle::make('nUpGridBody')
                ->size(12),
            ParagraphStyle::make('body')
                ->size(12),
            ParagraphStyle::make('sectionTitle')
                ->size(36)
                ->bold(),
            ParagraphStyle::make('sectionSubtitle')
                ->size(18)
                ->bold(),
        ];
    }

    public function paragraphStyle(string $key): ?ParagraphStyle
    {
        $style = collect($this->paragraphStyles())
            ->filter(fn(ParagraphStyle $style) => $style->key === $key)
            ->first();

        if ($style) {
            return $style;
        }

        return collect($this->defaultParagraphStyles())
            ->filter(fn(ParagraphStyle $style) => $style->key === $key)
            ->first();
    }

    public function paragraphStyleValue(string $styleKey, string $property): mixed
    {
        $style = $this->paragraphStyle($styleKey);

        if (!$style) {
            return null;
        }

        return $style->{$property} ?? null;
    }

    public function getChartColor(int $id, bool $asObject = true): string|Color
    {
        $argb = $this->getChartColors()[$id] ?? config('powerpoint.defaults.charts.seriesColor', 'ff000000');

        if ($asObject) {
            return new Color($argb);
        }

        return $argb;
    }

    public function getChartColors(): array
    {
        return array_merge(
            $this->defaultChartColors,
            $this->chartColors
        );
    }
}
