---
sidebar_position: 1
---

# Overview

Components are the building blocks of your slides. They are elements that make it easy to add content to your slides.

The package ships with several components that you can use out of the box. You can also create your own components.

When using components there are two important things to remember:

- The slide object is always passed as the first argument to the make method.
- You should always call the `render()` method at the end of your definition to render the component to the slide.

The following example adds a simple text box to the slide:

```php
use BernskioldMedia\LaravelPpt\Components\TextBox;
use BernskioldMedia\LaravelPpt\SlideMasters\Blank;

Blank::make(function (Blank $slide) {
    TextBox::make($slide, 'This is a text box')->render();
});
```

## Default customization methods

All components have the following methods for customizing their appearance:

- `x(float $x)` - Sets the x position of the component.
- `y(float $y)` - Sets the y position of the component.
- `position(float $x, float $y)` - Sets the x and y position of the component.
- `width(int $width)` - Sets the width of the component.
- `height(int $height)` - Sets the height of the component.
