<?php

namespace AlejandroAPorras\SpaceTraders\Support;

use AlejandroAPorras\SpaceTraders\SpaceTraders;
use ArrayAccess;
use ArrayIterator;
use IteratorAggregate;

class PaginatedResults implements ArrayAccess, IteratorAggregate
{
    public static function make(
        string $endpoint,
        string $mappingClass,
        SpaceTraders $spaceTraders,
    ): self {
        $response = $spaceTraders->get($endpoint);

        $results = array_map(
            fn ($attributes) => new $mappingClass($attributes, $spaceTraders),
            $response['data'],
        );

        return new self(
            $results,
            $response['meta'],
            $spaceTraders,
            $mappingClass,
        );
    }

    /**
     * @param  array{page: int, total: int, limit: int}  $meta
     */
    public function __construct(
        protected array $results,
        protected array $meta,
        protected SpaceTraders $spaceTraders,
        protected string $mappingClass
    ) {
    }

    public function results(): array
    {
        return $this->results;
    }

    public function total(): int
    {
        return $this->meta['total'];
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

    public function getIterator(): \Traversable
    {
        return new ArrayIterator($this->results);
    }
}
