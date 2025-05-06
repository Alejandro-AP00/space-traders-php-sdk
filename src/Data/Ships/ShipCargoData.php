<?php

namespace AlejandroAPorras\SpaceTraders\Data\Ships;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ShipCargoData extends DataResource
{
    public int $capacity;
    public int $units;
    /**
     * @var ShipCargoItemData[]
     */
    public array $inventory;

    public function __construct(array $attributes, $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->inventory = $this->transformCollection($this->inventory ?: [], ShipCargoItemData::class);
    }
}
