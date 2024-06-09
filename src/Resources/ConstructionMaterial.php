<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;

class ConstructionMaterial extends Resource
{
    public TradeGoodSymbol $tradeSymbol;

    public int $required;

    public bool $fulfilled;
}
