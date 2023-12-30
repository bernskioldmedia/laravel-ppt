# Bullet Points

The bullet point slide master is used for a slide that contains a title and a list of bullet points.

```php
use BernskioldMedia\LaravelPpt\SlideMasters\BulletPoints;

BulletPoints::make('My Title')
    ->bullet('My first bullet point')
    ->bullet('My second bullet point');
```

The title uses the `slideTitle` paragraph style and the bullet points the `bulletPoint` style by default. Both can be
changed in the package config.
