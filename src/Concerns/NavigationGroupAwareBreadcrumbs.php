<?php

namespace Saade\FilamentExtra\Concerns;

/** @method static \Filament\Resources\Resource getResource() */
trait NavigationGroupAwareBreadcrumbs
{
    public function getBreadcrumbs(): array
    {
        return [
            static::getResource()::getNavigationGroup(),
            static::getResource()::getUrl(name: 'index') => static::getResource()::getNavigationLabel(),
        ];
    }
}
