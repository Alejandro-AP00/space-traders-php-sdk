<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;

class ConstructionMaterialData extends DataResource
{
    public TradeGoodSymbol $tradeSymbol;

    public int $required;

    public bool $fulfilled;
}
