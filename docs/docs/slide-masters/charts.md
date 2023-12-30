---
sidebar_position: 7
---

# Charts

The package ships with several slide masters that contain charts. Each slide master takes a combination of a chart
component and content.

## Chart

This slide master only contains a chart shape with the same background color as the slide itself.

```php
use BernskioldMedia\LaravelPpt\SlideMasters\Chart;

Chart::make(
    Bar::make([
        'January' => 1,
        'February' => 2,
        'March' => 3,
    ])
);
```

## Square Chart

This slide master contains a single chart centered on the slide with a forced square shape.

```php
use BernskioldMedia\LaravelPpt\SlideMasters\ChartSquare;

ChartSquare::make(
    Bar::make([
        'January' => 1,
        'February' => 2,
        'March' => 3,
    ])
);
```

## Chart with Text

This slide master contains a chart on the right side and a text box on the left side.

```php
use BernskioldMedia\LaravelPpt\SlideMasters\ChartText;

ChartText::make(
    text: 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.',
    chart: Bar::make([
        'January' => 1,
        'February' => 2,
        'March' => 3,
    ])
);
```

The chart text uses the `body` paragraph style.

## Chart with Title

This slide master contains a full sized chart with a title on top.

```php
use BernskioldMedia\LaravelPpt\SlideMasters\ChartText;

ChartText::make(
    title: 'My Chart Title',
    chart: Bar::make([
        'January' => 1,
        'February' => 2,
        'March' => 3,
    ])
);
```

The chart title uses the `slideTitle` paragraph style.
