---
sidebar_position: 6
---

# Table

The table component is used to display data in a tabular format.

## Usage

```php
Blank::make(function(Blank $slide) {

    Table::make(
        columns: 2,
        rows: [
            Row::make([
                Cell::make('Cell Content'),
            ]),
]),
        ]
    )

});
```

:::note Default component appearance options
All components have a series of default appearance options that can be set. You can find the full list of options in the
component [Overview](/components/intro) section.
:::
