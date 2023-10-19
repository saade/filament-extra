<?php

namespace Saade\FilamentExtra\Forms\Components;

use Filament\Forms\Components\Component;

class RelationManager extends Component
{
    /**
     * @var view-string
     */
    protected string $view = 'filament-extra::forms.components.relation-manager';

    protected string $relationManagerClass;

    protected bool $lazy = true;

    /**
     * @param  class-string  $class
     */
    final public function __construct(string $class)
    {
        $this->relationManagerClass = $class;
    }

    /**
     * @param  class-string  $class
     */
    public static function make(string $class): static
    {
        return app(static::class, ['class' => $class]);
    }

    public function getRelationManagerClass(): string
    {
        return $this->relationManagerClass;
    }

    public function lazy(bool $lazy = true): static
    {
        $this->lazy = $lazy;

        return $this;
    }

    public function isLazy(): bool
    {
        return $this->lazy;
    }
}
