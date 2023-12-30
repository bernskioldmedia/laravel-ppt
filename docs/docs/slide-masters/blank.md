---
sidebar_position: 2
---

# Blank Slides

The blank slide is a blank canvas for you to customize completely through a callback.

## Completely Blank

```php
use BernskioldMedia\LaravelPpt\SlideMasters\Blank;

Blank::make(function(Blank $slide) {
    // Add slide components here...
});
```

## With Title

Another common use case is to have a blank slide but with a title. This is supported with the `BlankWithTitle` master:

```php
use BernskioldMedia\LaravelPpt\SlideMasters\BlankWithTitle;

BlankWithTitle::make('My Title', function(BlankWithTitle $slide) {
    // Add slide components here...
});
```

The title uses the `slideTitle` paragraph style by default, but you can change this default in the package config.

## With Title and Subtitle

Yet another common use case is to have a blank slide with a title and a subtitle. This is supported with
the `BlankWithSubtitle` master:

```php
use BernskioldMedia\LaravelPpt\SlideMasters\BlankWithTitleSubtitle;

BlankWithTitleSubtitle::make(
    title: 'My Title',
    subtitle: 'This is a subtitle',
    callback: function(BlankWithTitleSubtitle $slide) {
        // Add slide components here...
    }
);
```

The title uses the `slideTitle` paragraph style by default, and the subtitle uses the `slideSubtitle` paragraph style,
but you can change these defaults in the package config.
