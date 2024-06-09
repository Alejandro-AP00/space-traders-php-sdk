<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;

class ContractDeliverGood extends Resource
{
    public TradeGoodSymbol $tradeSymbol;

    public string $destinationSymbol;

    public int $unitsRequired;

    public int $unitsFulfilled;
}
