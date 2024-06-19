<?php

namespace AlejandroAPorras\SpaceTraders\Support;

use AlejandroAPorras\SpaceTraders\SpaceTraders;
use ArrayAccess;
use ArrayIterator;
use IteratorAggregate;
use Traversable;

class PaginatedResults implements ArrayAccess, IteratorAggregate
{
    public static function make(
        string $endpoint,
        string $mappingClass,
        SpaceTraders $spaceTraders,
        array $filters = []
    ): self {
        $query = self::buildFilterString($filters);
        ['data' => $data, 'meta' => $meta] = $spaceTraders->get("{$endpoint}{$query}");

        $results = array_map(
            fn ($attributes) => new $mappingClass($attributes, $spaceTraders),
            $data,
        );

        return new self(
            $endpoint,
            $results,
            $meta,
            $spaceTraders,
            $mappingClass,
            $filters
        );
    }

    /**
     * @param  array{page: int, total: int, limit: int}  $meta
     */
    public function __construct(
        protected string $endpoint,
        protected array $results,
        protected array $meta,
        protected SpaceTraders $spaceTraders,
        protected string $mappingClass,
        protected array $filters = [],
    ) {}

    public function results(): array
    {
        return $this->results;
    }

    public function total(): int
    {
        return $this->meta['total'];
    }

    public function previousPage(): ?array
    {
        if ($this->meta['page'] === 1) {
            return null;
        }

        $page = $this->meta['page'] - 1;

        return ['page' => $page];
    }

    public function nextPage(): ?array
    {
        if ($this->meta['page'] === $this->totalPages()) {
            return null;
        }

        $page = $this->meta['page'] + 1;

        return ['page' => $page];
    }

    public function totalPages(): int
    {
        return ceil($this->meta['total'] / $this->meta['limit']);
    }

    public function previous(): ?self
    {
        if (! $previousPage = $this->previousPage()) {
            return null;
        }

        return PaginatedResults::make($this->endpoint, $this->mappingClass, $this->spaceTraders, array_merge($this->filters, $previousPage));
    }

    public function next(): ?self
    {
        if (! $nextPage = $this->nextPage()) {
            return null;
        }

        return PaginatedResults::make($this->endpoint, $this->mappingClass, $this->spaceTraders, array_merge($this->filters, $nextPage));
    }

    public function currentPage(): int
    {
        return $this->meta['page'];
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->results[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->results[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->results[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->results[$offset]);
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->results);
    }

    protected static function buildFilterString(array $filters): string
    {
        if (count($filters) === 0) {
            return '';
        }

        $preparedFilters = [];
        foreach ($filters as $name => $value) {
            $preparedFilters[$name] = urlencode($value);
        }

        return '?'.http_build_query($preparedFilters);
    }
}
