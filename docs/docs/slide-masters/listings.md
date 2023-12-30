---
sidebar_position: 6
---

# Listings

The package comes with two listing slide masters which let you display teaser-style listings of your content.

The titles of the listings use the `nUpGridTitle` paragraph style, and the body text uses the `nUpGridBody` paragraph
style.

## Two-Up

The two-up listing slide master lets you display two items per slide. It is ideal for displaying a list of two items,

```php
use BernskioldMedia\LaravelPpt\SlideMasters\TwoUp;

TwoUp::make('My Title')
    ->box(1, 'Title', 'Teaser body text')
    ->box(2, 'Title', 'Teaser body text');
```

## Four-Up

The four-up listing slide master lets you display four items per slide. It is ideal for displaying a list of four items,
such as four products, four services, four team members, etc.

```php
use BernskioldMedia\LaravelPpt\SlideMasters\FourUp;

FourUp::make('My Title')
    ->box(1, 'Title', 'Teaser body text')
    ->box(2, 'Title', 'Teaser body text')
    ->box(3, 'Title', 'Teaser body text')
    ->box(4, 'Title', 'Teaser body text');
```

## Six up-Up

The six-up listing slide master lets you display six items per slide. It is ideal for displaying a list of six items,

```php
use BernskioldMedia\LaravelPpt\SlideMasters\SixUp;

SixUp::make('My Title')
    ->box(1, 'Title', 'Teaser body text')
    ->box(2, 'Title', 'Teaser body text')
    ->box(3, 'Title', 'Teaser body text')
    ->box(4, 'Title', 'Teaser body text')
    ->box(5, 'Title', 'Teaser body text')
    ->box(6, 'Title', 'Teaser body text');
```
