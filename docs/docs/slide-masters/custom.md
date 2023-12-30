---
sidebar_position: 8
---

# Creating a custom slide master

While the provided slide masters are a great start you will find yourself wanting to create your own slide masters. This
is a very simple process.

Slide masters can be placed in the `app/Presentations/SlideMasters` directory. This location can be customized in the
package config.

You can create a new slide master by running the following command:

```bash
php artisan make:slide-master MySlideMaster
```

## Adding data to the slide master

The slide master is a simple class that extends the `BaseSlide` class. You can place components in the `render()`
method. The constructor lets you pass in data that can be used in the render method.

The example below creates a slide master that centers the text on the slide:

```php
<?php

namespace App\Presentations\SlideMasters;

use BernskioldMedia\LaravelPpt\Presentation\BaseSlide;

class CenteredText extends BaseSlide
{

    public function __construct(
        public string $title
    ) {
    }

    protected function render(): void
    {
        TextBox::make($this, $this->title)
            ->paragraphStyle('body')
            ->width($this->presentation->width - $this->horizontalPadding * 2)
            ->position($this->horizontalPadding, $this->verticalPadding)
            ->centered()
            ->render();
    }
}
```

:::tip Consider the dynamic nature of the slide master
By fetching for example the width and height of the presentation, we can make the slide master dynamic and work with any
presentation size. The same goes for the padding. This way the slide master is as flexible as possible.
:::

## Using the slide master

Your slide master is used just like any other slide master, by calling its class and initializing it using its `make`
method, passing in the data it needs. The example below shows how to use the slide master we created above:

```php
CenteredText::make($this, 'My Title')->render();
```

:::notice Always use the make method
When using the slide master, always use the `make` method. This is because the slide master needs to be initialized
with the presentation instance. The make method contains this logic in the `BaseSlide`.
:::
