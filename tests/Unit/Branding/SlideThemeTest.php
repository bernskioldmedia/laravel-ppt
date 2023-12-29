<?php

use BernskioldMedia\LaravelPpt\Branding\SlideTheme;

it('can be created', function () {
    $theme = SlideTheme::make();

    expect($theme)->toBeInstanceOf(SlideTheme::class);
});

it('can set a custom master slide', function () {
    $theme = SlideTheme::make()->customMasterSlide('CustomMasterSlide');

    expect($theme->customMasterSlide)->toBe('CustomMasterSlide');
});

it('can copy settings from another slide theme', function () {
    $base = SlideTheme::make()
        ->backgroundColor('red')
        ->backgroundImage('image.jpg')
        ->chartBackgroundColor('blue')
        ->logo('logo.jpg')
        ->textColor('green')
        ->customMasterSlide('CustomMasterSlide');

    $theme = SlideTheme::make()->copyFromTheme($base);

    expect($theme->backgroundColor)->toBe('red')
        ->and($theme->backgroundImage)->toBe(resource_path('presentations/image.jpg'))
        ->and($theme->chartBackgroundColor)->toBe('blue')
        ->and($theme->logo)->toBe('logo.jpg')
        ->and($theme->textColor)->toBe('green')
        ->and($theme->customMasterSlide)->toBe('CustomMasterSlide');
});
