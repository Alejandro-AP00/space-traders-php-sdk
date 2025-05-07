<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class ConstructionData extends DataResource
{
    public string $symbol;

    /**
     * @var ConstructionMaterialData[]
     */
    public array $materials;

    public bool $isComplete;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->materials = $this->transformCollection($this->materials ?: [], ConstructionMaterialData::class);
    }
}
