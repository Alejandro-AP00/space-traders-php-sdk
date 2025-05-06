<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Contracts;

use ReflectionProperty;

/**
 * Base abstract class representing a data resource.
 * It provides automatic property assignment and serialization.
 */
abstract class DataResource
{
    // Raw input attributes (usually from API responses)
    public array $attributes = [];

    /**
     * Constructor.
     * Initializes the object with the provided attributes and fills the public properties.
     */
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
        $this->fill(); // Automatically assign values to class properties
    }

    /**
     * Assign values from $attributes to the corresponding class properties.
     * It handles:
     * - Naming conversion from snake_case to camelCase
     * - Enums via enum_exists
     * - Nested DataResource objects recursively
     */
    protected function fill(): void
    {
        foreach ($this->attributes as $key => $value) {
            $key = $this->camelCase($key); // Convert snake_case to camelCase

            if (property_exists($this, $key)) {
                $reflection = new ReflectionProperty($this, $key);
                $type = $reflection->getType();
                $name = $type->getName();

                // If the property is an enum, instantiate the enum
                if (enum_exists($name)) {
                    $value = $name::from($value);
                }

                // If the property is a subclass of DataResource, instantiate it recursively
                if (! $reflection->getType()->isBuiltIn() && ! enum_exists($type) && is_subclass_of($name, DataResource::class)) {
                    $value = new $name($value);
                }

                // Assign the value to the property
                $this->{$key} = $value;
            }
        }
    }

    /**
     * Converts the current object into an associative array.
     * It also converts nested DataResource objects using their own toArray() method.
     */
    public function toArray(): array
    {
        $publicProperties = get_object_vars($this);

        // Remove internal helper properties
        unset($publicProperties['attributes']);

        $properties = [];

        foreach ($publicProperties as $key => $value) {
            // Recursively convert nested objects if they implement toArray()
            $value = is_object($value) && property_exists($value, 'toArray') ? $value->toArray() : $value;

            // Convert camelCase property names back to snake_case
            $properties[$this->camelCase($key)] = $value;
        }

        return $properties;
    }

    /**
     * Converts a snake_case string to camelCase.
     * Example: 'ship_name' => 'shipName'
     */
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

    /**
     * Converts a camelCase string to snake_case.
     * Example: 'shipName' => 'ship_name'
     */
    protected function snakeCase(string $string): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $string));
    }

    /**
     * Transforms a collection of data arrays into an array of class instances.
     * Allows adding extra shared data to each item.
     */
    protected function transformCollection(array $collection, string $class, array $extraData = []): array
    {
        return array_map(function ($data) use ($class, $extraData) {
            return new $class($data + $extraData);
        }, $collection);
    }
}
