<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;

class ShipModificationTransaction extends Resource
{
    public string $waypointSymbol;

    public string $shipSymbol;

    public TradeGoodSymbol $tradeSymbol;

    public int $totalPrice;

    public string $timestamp;
}
