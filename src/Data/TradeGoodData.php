<?php

namespace AlejandroAPorras\SpaceTraders\Data;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;

class TradeGoodData extends DataResource
{
    public TradeGoodSymbol $symbol;

    public string $name;

    public string $description;
}
