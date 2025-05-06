<?php

namespace AlejandroAPorras\SpaceTraders\Data\Contracts;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;

class ContractDeliverGoodData extends DataResource
{
    public TradeGoodSymbol $tradeSymbol;

    public string $destinationSymbol;

    public int $unitsRequired;

    public int $unitsFulfilled;
}
