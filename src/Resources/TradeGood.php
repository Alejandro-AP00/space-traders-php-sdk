<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;

class TradeGood extends Resource
{
    public TradeGoodSymbol $symbol;

    public string $name;

    public string $description;
}
