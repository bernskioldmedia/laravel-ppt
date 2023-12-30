---
sidebar_position: 1
sidebar_label: Introduction
---

# Slide Masters

Slide Masters are the foundation of your presentation. They are the templates that define the look and feel of your
slides. You can create as many slide masters as you want, and you can apply them to any slide in your presentation.

The package ships with a series of pre-defined common slide masters, but you can also create your own.

## Common Customizations

All slide masters have a common set of customizations that you can apply to them when you use them in a presentation.

### Background

You can set the background of a slide master to be a solid color, or an image.

#### Setting a background color

```php
// Sets the background color of the slide master (in ARGB format).
$slide = Blank::make()
    ->backgroundColor('FFFF0000');
```

#### Setting a background image

For convenience the background image method by default will prepend the path to the base storage directory controlled in
the package config. This simplifies your code as you don't need to worry about base path every time.

By setting the second parameter to `false` you can disable this behavior.

```php
// Sets the background image of the slide master.
$slide = Blank::make()
    ->backgroundImage('background.jpg');

// Customizes the background image of the slide master.
$slide = Blank::make()
    ->backgroundImage(path: public_path('background.jpg'), isFullPath: false);
```

### Data Sources

You can include a data source or "credit" on your slide. This is typically used to indicate the source of the data
displayed on the slide.

```php
$slide = Blank::make()->withDataSource('My Data Source');
```

### Edge Images

Often you will want to include an image positioned in either corner of your slide. This is typically used to include a
logo or other branding image.

There is one method for each corner of the slide. You can use any combination of these methods to position your images.

```php
$slide = Blank::make()->bottomLeftImage(
    path: storage_path('images/logo.png'),
    width: 200,
    height: 50,
);
```

You can also link the image to a URL.

```php
$slide = Blank::make()->bottomLeftImage(
    path: storage_path('images/logo.png'),
    width: 200,
    height: 50,
    url: 'https://www.google.com'
);
```

### Logo

You can include a logo on your slide. This is typically loaded from the branding, but can also be disabled on a
per-slide basis.

```php

// Include a custom logo.
$slide = Blank::make()->withLogo(
    path: 'images/logo.png',
    width: 200,
    height: 50,
    url: 'https://www.google.com'
);

// Disable the logo.
$slide = Blank::make()->withoutLogo();
```

### Padding

You can set the padding of a slide master. This is the space between the edge of the slide and the content.

```php
// Sets the padding of the slide master.
$slide = Blank::make()->padding(x: 40, y: 40);

// Sets the padding of the horizontal and vertical axes of the slide master individually.
$slide = Blank::make()
    ->horizontalPadding(40)
    ->verticalPadding(60);
```

### Size

You can set the size of a slide master. This is the size of the slide in pixels.

```php
$slide = Blank::make()->width(1280)->height(720);
```

### Text Color

You can set the base text color of a slide master. This overrides any branding text colors, but does not override any
paragraph style colors. It is set in ARGB.

```php
$slide = Blank::make()->textColor('FFFF0000');
```
