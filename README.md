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
