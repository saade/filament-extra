<?php

namespace Saade\FilamentExtra\Concerns;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * @property string|null $relationshipKey Define custom relationship key (if it does not match the table name pattern).
 * @property string|null $pageNamePrefix Define custom child page name prefix (if it does not match the resource's slug).
 */
trait HasParentResource
{
    public Model | int | string | null $parentRecord = null;

    public function bootHasParentResource(): void
    {
        if ($parent = (request()->route('parent') ?? request()->input('parent'))) {
            $parentResource = static::getParentResource();

            $this->parentRecord = $parentResource::resolveRecordRouteBinding($parent);

            if (! $this->parentRecord) {
                throw new ModelNotFoundException();
            }
        }
    }

    public static function getParentResource(): string
    {
        $parentResource = static::getResource()::$parentResource;

        if (! isset($parentResource)) {
            throw new Exception('Parent resource is not set for ' . static::class);
        }

        return $parentResource;
    }

    protected function applyFiltersToTableQuery(Builder $query): Builder
    {
        return $query->where($this->getParentRelationshipKey(), $this->parentRecord->getKey());
    }

    public function getParentRelationshipKey(): string
    {
        return $this->relationshipKey ?? $this->parentRecord?->getForeignKey();
    }

    public function getChildPageNamePrefix(): string
    {
        return $this->pageNamePrefix ?? (string) str(static::getResource()::getSlug())
            ->replace('/', '.')
            ->afterLast('.');
    }

    public function getBreadcrumbs(): array
    {
        $resource = static::getResource();
        $parentResource = static::getParentResource();

        $breadcrumbs = [
            $parentResource::getUrl() => $parentResource::getBreadCrumb(),
            $parentResource::getRecordTitle($this->parentRecord),
            $parentResource::getUrl(name: $this->getChildPageNamePrefix() . '.index', parameters: ['parent' => $this->parentRecord]) => $resource::getBreadCrumb(),
            $this->getBreadCrumb(),
        ];

        return $breadcrumbs;
    }
}
