# Slide Themes

Slide themes are a way to customize the look and feel of your slides in an expressive format. In your branding class you
can define both a default theme to be used for all slides, as well as a theme for any slide master.

## Specifying a default theme

To specify a default theme, you can override the `defaultTheme` method in your branding class. This method should return
a `SlideTheme` object. For example:

```php
public function defaultTheme(): SlideTheme
{
    return SlideTheme::make()
        ->logo(
            path: $this->assetFolderPath() . '/logo.png',
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
```

## Specifying a slide master theme

It is also possible to specify a theme for a specific slide master. To do this, you can override the `slideTheme` method
in your branding class. This method receives the slide master as an argument, and should return a `SlideTheme` object.

```php
use BernskioldMedia\LaravelPpt\SlideMasters\Blank;

public function slideTheme(?string $slideClass = null): SlideTheme
{
    return match($slideClass) {
        // Design blank slides to have a black background and white text and no logo
        // instead of the default white background and black text.
        Blank::class => SlideTheme::make()
            ->backgroundColor(Color::COLOR_BLACK)
            ->chartBackgroundColor(Color::COLOR_BLACK)
            ->textColor(Color::COLOR_WHITE),
        default => $this->defaultTheme(),
    };
}
```
