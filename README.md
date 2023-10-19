# Filament Extra

[![Latest Version on Packagist](https://img.shields.io/packagist/v/saade/filament-extra.svg?style=flat-square)](https://packagist.org/packages/saade/filament-extra)
[![Total Downloads](https://img.shields.io/packagist/dt/saade/filament-extra.svg?style=flat-square)](https://packagist.org/packages/saade/filament-extra)

A set of reusable Filament helpers, columns, fields, actions and more!

## Installation

You can install the package via composer:

```bash
composer require saade/filament-extra
```
- [Filament Extra](#filament-extra)
  - [Installation](#installation)
  - [Forms](#forms)
    - [Relation Manager](#relation-manager)
    - [ColorSelect](#colorselect)
  - [Support](#support)
    - [class Color](#class-color)
    - [function color](#function-color)
    - [function html](#function-html)
    - [function md](#function-md)
    - [function blade](#function-blade)
  - [Changelog](#changelog)
  - [Contributing](#contributing)
  - [Security Vulnerabilities](#security-vulnerabilities)
  - [Credits](#credits)
  - [License](#license)

## Forms

### Relation Manager
This field lets you render a [Relation Manager]() inside a form. It's useful if you need to render it inside a tab or a modal.

```php
use Saade\FilamentExtra\Forms\Components\RelationManager;
use App\Filament\Resources\YourResource\RelationManagers\YourRelationManager;

RelationManager::make(YourRelationManager::class)
    ->lazy(bool $lazy = true)
```

### ColorSelect
This field lets you pick a Filament color from your application.

```php
use Saade\FilamentExtra\Forms\Components\ColorSelect;

ColorSelect::make('color')
```

## Support

### class Color
This class helps you interact with Filament colors. It's useful if you need to convert a color to a hex value, pick a shade to `collect()` Filament colors.

```php
use Saade\FilamentExtra\Support\Color;

Color::make(name: 'fuchia', shade: 200)
  ->shade(int $shade = 500)   // Set a shade
  ->get()                     // Returns the color as array of shades
  ->toHex()                   // Returns the color as hex value
  ->toRgb()                   // Returns the color as rgb value
  ->collect()                 // Returns the color as a Laravel Collection
```

### function color
This function is a shortcut to the `Color` class.

```php
use function Saade\FilamentExtra\Support\color;

color(name: 'fuchia', shade: 200)
  ->shade(int $shade = 500)   // Set a shade
  ->get()                     // Returns the color as array of shades
  ->toHex()                   // Returns the color as hex value
  ->toRgb()                   // Returns the color as rgb value
  ->collect()                 // Returns the color as a Laravel Collection
```

### function html
Use this function as a shortcut to the `Illuminate\Support\HtmlString` class.

```php
use Filament\Forms;

use function Saade\FilamentExtra\Support\html;

Filament\Forms\Components\SomeField::make()
  ->label(
    html('<span class="text-red-500">*</span> Label')
  )
```

### function md
Use this function as a shortcut to the `Illuminate\Support\HtmlString` class to convert markdown to HtmlString.

```php
use Filament\Forms;

use function Saade\FilamentExtra\Support\md;

Filament\Forms\Components\SomeField::make()
  ->label(
    md('### Label')
  )
```

### function blade
Use this function to render blade templates.

```php
use Filament\Forms;

use function Saade\FilamentExtra\Support\blade;

Filament\Forms\Components\SomeField::make()
  ->label(
    blade('<x-heroicon::some-icon class="w-5 h-5" /> Label', ['some' => 'data'])
  )
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Saade](https://github.com/saade)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
