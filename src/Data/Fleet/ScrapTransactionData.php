<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ScrapTransactionData extends DataResource
{
    public string $waypointSymbol;

    public string $shipSymbol;

    public int $totalPrice;

    public string $timestamp;
}
