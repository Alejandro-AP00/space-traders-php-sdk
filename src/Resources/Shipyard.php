<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\ShipType;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class Shipyard extends Resource
{
    public string $symbol;

    /**
     * @var ShipType[]
     */
    public array $shipTypes;

    /**
     * @var ShipyardTransaction[]
     */
    public array $transactions;

    /**
     * @var ShipyardShip[]
     */
    public array $ships;

    public int $modificationsFee;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->shipTypes = array_map(fn ($shipType) => ShipType::from($shipType), $this->shipTypes);
        $this->transactions = $this->transformCollection($this->transactions ?: [], ShipyardTransaction::class);
        $this->ships = $this->transformCollection($this->ships ?: [], ShipyardShip::class);
    }
}
