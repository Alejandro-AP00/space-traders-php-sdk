<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;

class ShipModificationTransactionData extends DataResource
{
    public string $waypointSymbol;

    public string $shipSymbol;

    public TradeGoodSymbol $tradeSymbol;

    public int $totalPrice;

    public string $timestamp;
}
