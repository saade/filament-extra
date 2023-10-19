<?php

namespace Saade\FilamentExtra\Support;

if (! function_exists('Saade\FilamentExtra\Support\color')) {
    function color(string $colorName, int $shade = 500): Color
    {
        return Color::make($colorName, $shade);
    }
}

if (! function_exists('Saade\FilamentExtra\Support\html')) {
    function html(string $html = null): ?\Illuminate\Support\HtmlString
    {
        if (! $html) {
            return null;
        }

        return new \Illuminate\Support\HtmlString($html);
    }
}

if (! function_exists('Saade\FilamentExtra\Support\md')) {
    function md(string $string = null): ?\Illuminate\Support\HtmlString
    {
        if (! $string) {
            return null;
        }

        return \Illuminate\Support\Str::of($string)->markdown()->toHtmlString();
    }
}

if (! function_exists('Saade\FilamentExtra\Support\blade')) {
    function blade(string $string = null, array $data = [], bool $deleteCachedView = false): ?string
    {
        if (! $string) {
            return null;
        }

        return \Illuminate\Support\Facades\Blade::render($string, $data, $deleteCachedView);
    }
}
