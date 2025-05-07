<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class RepairTransactionData extends DataResource
{
    public string $waypointSymbol;

    public string $shipSymbol;

    public string $totalPrice;

    public string $timestamp;
}
