---
sidebar_position: 2
---

# Bullet Points

Bullet points are used to list out a set of items. They are used to make the content more readable and easy to
understand.

## Usage

```php
use BernskioldMedia\LaravelPpt\Components\BulletPointBox;
use BernskioldMedia\LaravelPpt\SlideMasters\Blank;

Blank::make(function (Blank $slide) {
    BulletPointBox::make($slide)
        ->bullet('First bullet point')
        ->bullet('Second bullet point')
        ->bullet('Third bullet point')
        ->render();
});
```

:::note Default component appearance options
All components have a series of default appearance options that can be set. You can find the full list of options in the
component [Overview](/components/intro) section.
:::

## Adjusting the text appearance

You can control the appearance of the text by applying a paragraph style to the bullet points:

```php
BulletPointBox::make($slide)
    ->paragraphStyle('bullet-points')
    ->bullet('Bullet point')
    ->render();
```

## Customizing the bullet character

You can customize the bullet character by passing a string to the `bulletCharacter()` method:

```php
BulletPointBox::make($slide)
    ->bulletCharacter('-') // Use a dash instead of a bullet.
    ->bullet('Bullet point')
    ->render();
```

## Customizing the spacing

You can customize the spacing between the bullet points by passing a number to the `spacingAfter()` method:

```php
BulletPointBox::make($slide)
    ->spacingAfter(12)
    ->bullet('Bullet point')
    ->render();
```
