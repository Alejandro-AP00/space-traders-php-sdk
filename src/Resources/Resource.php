<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\SpaceTraders;
use ReflectionProperty;

class Resource
{
    public array $attributes = [];

    protected ?SpaceTraders $spaceTraders;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        $this->attributes = $attributes;

        $this->spaceTraders = $spaceTraders;

        $this->fill();
    }

    protected function fill(): void
    {
        foreach ($this->attributes as $key => $value) {
            $key = $this->camelCase($key);

            if (property_exists($this, $key)) {
                $reflection = new ReflectionProperty($this, $key);
                $type = $reflection->getType();
                $name = $type->getName();

                if (enum_exists($name)) {
                    $value = $name::from($value);
                }

                if (! $reflection->getType()->isBuiltIn() && ! enum_exists($type) && is_subclass_of($name, Resource::class)) {
                    $value = new $name($value);
                }

                $this->{$key} = $value;
            }
        }
    }

    public function toArray(): array
    {
        $publicProperties = get_object_vars($this);
        unset($publicProperties['attributes']);
        unset($publicProperties['spaceTraders']);

        $properties = [];

        foreach ($publicProperties as $key => $value) {
            $properties[$this->snakeCase($key)] = $value;
        }

        return $properties;
    }

    protected function camelCase(string $string): string
    {
        $parts = explode('_', $string);

        foreach ($parts as $i => $part) {
            if ($i !== 0) {
                $parts[$i] = ucfirst($part);
            }
        }

        return str_replace(' ', '', implode(' ', $parts));
    }

    protected function snakeCase(string $string): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $string));
    }

    /**
     * Transform the items of the collection to the given class.
     */
    protected function transformCollection(array $collection, string $class, array $extraData = []): array
    {
        return array_map(function ($data) use ($class, $extraData) {
            return new $class($data + $extraData, $this->spaceTraders);
        }, $collection);
    }
}
