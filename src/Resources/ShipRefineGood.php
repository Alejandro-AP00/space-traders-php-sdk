<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;

class ShipRefineGood extends Resource
{
    public TradeGoodSymbol $tradeSymbol;

    public int $units;
}
