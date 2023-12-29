---
sidebar_position: 7
---

# Text

There are two types of text components that can be used on a slide. The standard text box, as well as a multi-text box
that supports multiple paragraphs.

:::note Default component appearance options
All components have a series of default appearance options that can be set. You can find the full list of options in the
component [Overview](/components/intro) section.
:::

## Adding a text box

```php
use BernskioldMedia\LaravelPpt\Components\TextBox;
use BernskioldMedia\LaravelPpt\SlideMasters\Blank;

Blank::make(function (Blank $slide) {
    TextBox::make($slide, 'This is a text box')->render();
});
```

## Adding a multi-text box

The multi-text box supports multiple instances of texts. Each text should be an instance of `TextPart`.

```php
use BernskioldMedia\LaravelPpt\Components\MultiTextBox;
use BernskioldMedia\LaravelPpt\SlideMasters\Blank;

Blank::make(function (Blank $slide) {
    MultiTextBox::make($slide, [
        TextPart::make('This is the first paragraph'),
        TextPart::make('This is the second paragraph'),
    ])->render();
});
```
