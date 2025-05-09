<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;

class ExtractionYieldData extends DataResource
{
    public TradeGoodSymbol $symbol;

    public int $units;
}
