<?php

namespace Saade\FilamentExtra\Forms\Components;

use Filament\Forms\Components\Select;
use Saade\FilamentExtra\Support\Color;

use function Saade\FilamentExtra\Support\blade;
use function Saade\FilamentExtra\Support\color;

class ColorSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->allowHtml();

        $this->options(
            fn () => Color::collect()
                ->mapWithKeys(
                    function ($color, $name) {
                        $label = __('filament-extra::colors.' . $name);
                        $color = color($name)->toRgb();

                        return [$name => blade(<<<HTML
                            <div class="flex items-center">
                                <div class="w-5 h-5 rounded-md" style="background-color: $color"></div>
                                <span class="px-2">$label</span>
                            </div>
                        HTML)];
                    }
                )
        );
    }
}
