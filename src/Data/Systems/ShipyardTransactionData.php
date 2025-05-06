<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\ShipType;

class ShipyardTransactionData extends DataResource
{
    public string $waypointSymbol;

    public string $shipSymbol;

    public ShipType $shipType;

    public int $price;

    public string $agentSymbol;

    public string $timestamp;
}
