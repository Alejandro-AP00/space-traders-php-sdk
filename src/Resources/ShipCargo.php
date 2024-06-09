<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\SpaceTraders;

class ShipCargo extends Resource
{
    public int $capacity;

    public int $units;

    /**
     * @var ShipCargoItem[]
     */
    public array $inventory;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->inventory = $this->transformCollection($this->inventory ?: [], ShipCargoItem::class);
    }
}
