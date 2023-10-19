<?php

namespace Saade\FilamentExtra\Support;

use Spatie\Color\Rgb;

class Color extends \Filament\Support\Colors\Color
{
    protected array $color;

    final public function __construct(protected string $name, protected ?int $shade = 500)
    {
        $this->color = static::all()[$this->name];
    }

    public static function make(string $name, ?int $shade = 500): static
    {
        return app(static::class, ['name' => $name, 'shade' => $shade]);
    }

    public function get(): array
    {
        return $this->color;
    }

    public function shade(int $shade): static
    {
        $this->shade = $shade;

        return $this;
    }

    public function toHex(): string
    {
        return Rgb::fromString(str($this->color[$this->shade])->wrap('rgb(', ')'))->toHex();
    }

    public function toRgb(): string
    {
        return str($this->color[$this->shade])->wrap('rgb(', ')')->toString();
    }

    public static function collect(): \Illuminate\Support\Collection
    {
        return collect(static::all());
    }
}
