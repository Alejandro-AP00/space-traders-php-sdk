<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\SpaceTraders;

class Construction extends Resource
{
    public string $symbol;

    /**
     * @var ConstructionMaterial[]
     */
    public array $materials;

    public bool $isComplete;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->materials = $this->transformCollection($this->materials ?: [], ConstructionMaterial::class);
    }
}
