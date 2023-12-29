---
sidebar_position: 4
---

# Image

The Image component is used to insert an image to a slide.

## Usage

```php
use BernskioldMedia\LaravelPpt\Components\Image;
use BernskioldMedia\LaravelPpt\SlideMasters\Blank;

Blank::make(function (Blank $slide) {
    Image::make($slide, storage_path('image.jpg'))->render();
});
```

:::note Default component appearance options
All components have a series of default appearance options that can be set. You can find the full list of options in the
component [Overview](/components/intro) section.
:::
