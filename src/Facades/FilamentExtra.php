<?php

namespace Saade\FilamentExtra\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Saade\FilamentExtra\FilamentExtra
 */
class FilamentExtra extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Saade\FilamentExtra\FilamentExtra::class;
    }
}
