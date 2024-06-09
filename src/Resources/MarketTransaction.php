<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\Enums\TransactionType;

class MarketTransaction extends Resource
{
    public string $waypointSymbol;

    public string $shipSymbol;

    public TradeGoodSymbol $tradeSymbol;

    public TransactionType $type;

    public int $units;

    public int $pricePerUnit;

    public int $totalPrice;

    public string $timestamp;
}
