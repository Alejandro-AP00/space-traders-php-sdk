<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\ShipType;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class ShipyardData extends DataResource
{
    public string $symbol;

    /**
     * @var ShipType[]
     */
    public array $shipTypes;

    /**
     * @var ShipyardTransaction[]
     */
    public array $transactions = [];

    /**
     * @var ShipyardShip[]
     */
    public array $ships = [];

    public int $modificationsFee;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->shipTypes = array_map(fn ($shipType) => ShipType::from($shipType['type']), $this->shipTypes);
        $this->transactions = $this->transformCollection($this->transactions ?: [], ShipyardTransactionData::class);
        $this->ships = $this->transformCollection($this->ships ?: [], ShipyardShipData::class);
    }
}
