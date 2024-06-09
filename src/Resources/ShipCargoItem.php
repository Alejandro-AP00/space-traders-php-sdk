<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;

class ShipCargoItem extends Resource
{
    public TradeGoodSymbol $symbol;

    public string $name;

    public string $description;

    public int $units = 1;
}
