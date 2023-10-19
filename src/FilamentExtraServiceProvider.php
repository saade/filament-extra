<?php

namespace Saade\FilamentExtra;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentExtraServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-extra';

    public static string $viewNamespace = 'filament-extra';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasTranslations()
            ->hasViews(static::$viewNamespace);
    }
}
