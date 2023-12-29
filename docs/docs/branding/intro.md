# Branding

The package supports different branding options so that you can customize the look and feel of the generated
presentations. There is a customizable default theme that is used if no other theme is specified.

Branding is applied in a hierarchical manner:

1. Branding overridden on a per-presentation basis.
2. Branding assigned to the user.
3. Default branding defined in the configuration file.

The package ships with a default branding class that is designed to be extended to create your own branding.

## Creating a branding

To create your own branding you expect the `Branding` class and override and extend methods as required. A good place to
put your branding classes is in the `app/Presentations/Branding` directory.

Refer to the [Paragraph Styles](paragraph-styles.md) section for more information on how to add and use paragraph
styles. Refer to the [Slide Themes](slide-themes.md) section for more information on how to add and use themes.

```php
<?php

namespace App\Presentation\Branding;

use BernskioldMedia\LaravelPpt\Branding\Branding;

class MyBrandning extends Branding
{
    
    /**
     * The creator name.
     */
    protected string $creatorCompanyName = 'My Company';
    
    /**
     * The creator website URL.
     */
    protected string $websiteUrl = 'https://example.com';
    
    /**
     * The default font used for slide components.
     */
    protected string $baseFont = 'Arial';
    
    /**
     * A list of chart colors in ARGB format.
     * Will be merged with the default colors, where the
     * branding colors will take precedence.
     */
    protected array $chartColors = [
        'ffff0000',
        'ff00ff00',
        'ff0000ff',
    ];
    
    /**
     * The default theme to use for slides.
     */
    public function defaultTheme(): SlideTheme
    {
        return SlideTheme::make()
            ->logo(
                path: $this->assetFolderPath().'/logo.png',
                dimensions: [
                    'width' => 100,
                    'height' => 50,
                ],
                url: $this->url(),
            )
            ->backgroundColor(Color::COLOR_WHITE)
            ->chartBackgroundColor(Color::COLOR_WHITE)
            ->textColor(Color::COLOR_BLACK);
    }

    /**
     * Paragraph styles for this branding instance.
     * Override this method to customize the paragraph styles.
     * The styles returned here will be merged with the default styles.
     *
     * @return ParagraphStyle[]
     */
    protected function paragraphStyles(): array
    {
        return [
            ParagraphStyle::make('slideTitle')
                ->size(24)
                ->bold(),
        ];
    }
}
```

## Assign branding by user

It can be useful to base the branding on the user that is logged in. This can be done by assigning a branding class to
the user. This requires implementing the `CustomizesPowerpointBranding` interface on the user model and returning the
branding class string from the `powerpointBrandingClass` method.

```php
class User extends Authenticatable implements CustomizesPowerpointBranding
{
    /**
     * Get the branding class for the user.
     */
    public function powerpointBrandingClass(): string
    {
        return MyBrandning::class;
    }
}
```

## Force branding for a presentation

Sometimes you may want to force a specific branding for a presentation. This can be useful if you normally use per-user
branding but want specific decks to use a different branding. This can be done by passing the branding class to the
`Presentation` class when creating a new presentation.

```php
class MyPresentation implements SlideDeck
{
    public function create(): Presentation
    {
        return Presentation::make(
            title: 'My Force-Branded Presentation',
        )
            ->branding(MyBrandning::class)
            ->slides([
                // Your slides...
            ])
            ->create();
    }
}
```
