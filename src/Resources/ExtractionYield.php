<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;

class ExtractionYield extends Resource
{
    public TradeGoodSymbol $symbol;

    public int $units;
}
