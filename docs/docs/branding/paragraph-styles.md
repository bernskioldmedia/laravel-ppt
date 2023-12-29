# Paragraph Styles

A key component of the branding system is the paragraph styles. They allow you to define styles that can be used on text
elements throughout your slides. The appearance can then change based on the [brandning](/branding/intro) that is
applied.

:::note Defining fallback styles
It is recommended to define all paragraph styles in your default branding class to create a fallback. Default styles
will be merged with the branding styles. This lets you be efficient with how you define your styles and keep your code
DRY.
:::

## Defining default paragraph styles

To define default paragraph styles, you can use the `defaultParagraphStyles` property on the `Branding` class. This
method should only be used on the default branding class. For other branding classes, you should use
the `paragraphStyles` (see below).

```php
/**
 * Default paragraph styles for all brandings.
 *
 * @return ParagraphStyle[]
 */
protected function defaultParagraphStyles(): array
{
    return [
        ParagraphStyle::make('slideTitle')
            ->size(24)
            ->bold(),
    ];
}
```

## Defining paragraph styles

To define paragraph styles, you can use the `paragraphStyles` property on the `Branding` class. This method should only
be used on non-default branding classes. For the default branding class, you should use the `defaultParagraphStyles`.

```php
/**
 * Paragraph styles for the branding.
 *
 * @return ParagraphStyle[]
 */

protected function paragraphStyles(): array
{
    return [
        // Override the default slideTitle style to be not bold.
        ParagraphStyle::make('slideTitle')
            ->bold(false),
    ];
}
```

## Styling the paragraph

There are fluent methods available to style the paragraph. These methods are chainable. The following methods are
available:

- `size(int $size)`: Set the font size (in pixels).
- `bold(bool $bold = true)`: Set the font weight to bold.
- `color(string $color)`: Set the font color (in ARGB format).
- `uppercase(bool $uppercase = true)`: Set the text to uppercase.
- `underlined(bool $underlined = true)`: Set the text to underlined.
- `letterSpacing(int $spacing)`: Set the letter spacing (in pixels).
- `font(string $font)`: Set the font family.
- `lineHeight(int $height)`: Set the line height (in pixels).
