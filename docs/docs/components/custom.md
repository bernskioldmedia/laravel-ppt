---
sidebar_position: 100
---

# Creating a custom component

You can easily create your own components to use. This is useful if you want to create more opinionated components, or
if you want to create a component that is not yet supported by the package.

A good place to put custom components are in the `app/Presentations/Components` directory.

To create a custom component you should extend the `Component` class and implement the `render()` method. This is the
method where you add data to the slide.

```php
<?php

namespace App\Presentation\Components;

use BernskioldMedia\LaravelPpt\Components\Component;

class MyComponent extends Component
{
    public function render(): static
    {
        // Add data to the slide.
        
        return $this;
    }
}
```

Adding data to the slide is used through the PHP Presentation syntax. When writing your render method you can access the
raw PHP Presentation object through the `raw()` method on the slide property:

```php
<?php

namespace App\Presentation\Components;

use BernskioldMedia\LaravelPpt\Components\Component;

class MyComponent extends Component
{
    public function render(): static
    {
          $this->slide
            ->raw()
            ->createRichShape()
            ->createTextRun('Hello World');
          
          return $this;
    }
}
```
