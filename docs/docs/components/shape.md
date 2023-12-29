---
sidebar_position: 5
---

# Shape

The Shape component lets you draw any shape on a slide. It can be used to draw simple shapes like rectangles and
circles. It can also be used to draw more complex shapes like polygons and stars.

## Usage

```php
use BernskioldMedia\LaravelPpt\Components\Shape;
use BernskioldMedia\LaravelPpt\SlideMasters\Blank;

Blank::make(function (Blank $slide) {
    
    // Create a rectangle shape.
    Shape::make($slide)->render();
    
});
```

:::note Default component appearance options
All components have a series of default appearance options that can be set. You can find the full list of options in the
component [Overview](/components/intro) section.
:::

## Controlling the shape type

The shape type can be controlled by using the `type()` method. The default shape type is `rectangle`. All available
shapes can be found on the `PhpOffice\PhpPresentation\Shape\AutoShape` class as constants.

```php
Shape::make($slide)->type(AutoShape::TYPE_10_POINT_STAR)->render();
```

There are also a few helper methods for the most common shapes:

```php
// Draw a circle.
Shape::make($slide)->round()->render();

// Draw a rounded rectangle.
Shape::make($slide)->rounded()->render();
```

## Controlling appearance

There are a number of methods available to control the appearance of the shape:

- `backgroundColor(string $argb)` - Set the background color of the shape.
- `border(string $color, float $size = 1.0, string $type = Fill:FILL_SOLID)` - Set the border.
- `borderSize(int $size)` - Set the border size.
- `borderType(string $type)` - Set the border type.
- `borderColor(string $color)` - Set the border color.
- `rotate(int $degrees = 0)` - Rotate the shape by the given number of degrees.
- `url(string $url)` - Set a URL to open when the shape is clicked.
- `linkToSlide(int $slideNumber)` - Set a slide number to link to when the shape is clicked.
- `useTextColorForLink(bool $use)` - Use the text color for the link instead of the default hyperlink color.

:::note Default component appearance options
All components have a series of default appearance options that can be set. You can find the full list of options in the
component [Overview](/components/intro) section.
:::

