---
sidebar_position: 3
---

# Titles

## Title Only

A common type of slide is one that has a title, used to introduce a new topic or section.

```php
use BernskioldMedia\LaravelPpt\SlideMasters\Title;

Title::make('My Title');
```

The title uses the `sectionTitle` paragraph style.

## Title and Subtitle

A title slide can also have a subtitle, which is useful for adding a bit more context to the title.

```php
use BernskioldMedia\LaravelPpt\SlideMasters\TitleSubtitle;

TitleSubtitle::make('My Title', 'My Subtitle');
```

The title uses the `sectionTitle` paragraph style and the subtitle uses the `sectionSubtitle` paragraph style.
