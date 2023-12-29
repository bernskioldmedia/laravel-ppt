<?php

use BernskioldMedia\LaravelPpt\Branding\ParagraphStyle;

it('can be created', function () {
    $style = ParagraphStyle::make('test');

    expect($style)->toBeInstanceOf(ParagraphStyle::class)
        ->toHaveProperty('key', 'test');
});

it('can be converted to an array', function() {
    $style = ParagraphStyle::make('test')
        ->size(12)
        ->color('red')
        ->font('Arial');

    expect($style->toArray())->toBe([
        'key' => 'test',
        'settings' => [
            'size' => 12,
            'color' => 'red',
            'letterSpacing' => 0.0,
            'font' => 'Arial',
            'bold' => false,
            'underlined' => false,
            'lineHeight' => 100,
            'uppercase' => false,
        ],
    ]);
});
