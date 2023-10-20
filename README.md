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
  - [Concerns](#concerns)
    - [trait HasSoftDeletedRecords](#trait-hassoftdeletedrecords)
    - [trait NavigationGroupAwareBreadcrumbs](#trait-navigationgroupawarebreadcrumbs)
    - [trait HasParentResource](#trait-hasparentresource)
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

## Concerns

### trait HasSoftDeletedRecords
Tired of overriding the `getEloquentQuery` method in every resource? This trait will handle soft deletes for you.

```php
use Filament\Resources\Resource;

use Saade\FilamentExtra\Concerns\HasSoftDeletedRecords;

class YourResource extends Resource
{
    use HasSoftDeletedRecords;
}
```

### trait NavigationGroupAwareBreadcrumbs
This trait will handle breadcrumbs for you. It's useful if you need to render breadcrumbs for a resource that belongs to a navigation group.

```php
use Filament\Resources\Pages\CreateRecord;

use Saade\FilamentExtra\Concerns\NavigationGroupAwareBreadcrumbs;

class CreateYourRecord extends CreateRecord
{
    use NavigationGroupAwareBreadcrumbs;
}
```

### trait HasParentResource
This trait will handle nested resources for you. [Read the blog post](https://laraveldaily.com/post/filament-nested-resources-courses-lessons) if you want to know more. This code was partially taken from [LaravelDaily/filament-nested-resources](https://github.com/LaravelDaily/filament-nested-resources) and contributed back to the community.

1. Add the `$parentResource` property to your child resource.
```php
use Filament\Resources\Resource;

class ChildResource extends Resource
{
    public static ?string $parentResource = ParentResource::class;
}
```

2. Add the child resource pages to the parent resource.
```php
use Filament\Resources\Resource;

class ParentResource extends Resource
{
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageParents::route('/'),
            'edit' => Pages\EditParent::route('/{record}/edit'),

            // Please note that 'child' can be anything you want. It defaults to the resource slug.
            // If you want to change it, you need to override the $pageNamePrefix property on the child resource pages.
            'child.index' => ChildResource\Pages\ListChildren::route('/{parent}/children'),
            'child.create' => ChildResource\Pages\CreateChild::route('{parent}/children/create'),
            'child.edit' => ChildResource\Pages\EditChild::route('{parent}/children/{record}/edit'),
        ];
    }
}
```

3. Add the trait to your child resource pages.
```php
use Filament\Resources\Pages\ListRecords;

use Saade\FilamentExtra\Concerns\HasParentResource;

class ListChildren extends ListRecords
{
    use HasParentResource;

    // (optional) Define custom relationship key (if it does not match the table name pattern).
    protected ?string $relationshipKey = 'parent_id';

    // (optional) Define custom child page name prefix for child pages (if it does not match the parent resource slug).
    protected ?string $pageNamePrefix = 'child';
}
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
- [LaravelDaily](https://github.com/LaravelDaily/filament-nested-resources) For the nested resource implementation.
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
