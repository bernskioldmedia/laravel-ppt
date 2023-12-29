<?php

use BernskioldMedia\LaravelPpt\Branding\Branding;
use BernskioldMedia\LaravelPpt\Branding\ParagraphStyle;
use BernskioldMedia\LaravelPpt\Branding\SlideTheme;

it('can be created', function () {
    $branding = Branding::make();

    expect($branding)->toBeInstanceOf(Branding::class);
});

it('loads default values from config', function () {
    $branding = Branding::make();

    expect($branding->url())->toBe('https://bernskioldmedia.com')
        ->and($branding->creatorCompanyName())->toBe('Bernskiold Media')
        ->and($branding->baseFont())->toBe('Arial')
        ->and($branding->chartColors())->toBe(['ff000000']);
});

it('can get the asset folder path', function () {
    $branding = Branding::make();

    expect($branding->assetFolderPath())->toBe(resource_path('presentations/branding/branding'));
});

it('can get the branding key', function () {
    $branding = Branding::make();

    expect($branding->key())->toBe('branding');
});

it('can get the default theme', function () {
    $branding = Branding::make();

    expect($branding->defaultTheme())->toBeInstanceOf(SlideTheme::class);
});

it('can get the customized theme', function () {
    $branding = Branding::make();

    expect($branding->slideTheme())->toBeInstanceOf(SlideTheme::class);
});

it('can get a paragraph style', function () {
    $branding = Branding::make();

    expect($branding->paragraphStyle('slideTitle'))->toBeInstanceOf(ParagraphStyle::class);
});
