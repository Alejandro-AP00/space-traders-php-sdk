<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\ShipType;

class ShipyardTransaction extends Resource
{
    public string $waypointSymbol;

    public string $shipSymbol;

    public ShipType $shipType;

    public int $price;

    public string $agentSymbol;

    public string $timestamp;
}
