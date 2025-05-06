<?php

namespace AlejandroAPorras\SpaceTraders\Data\Ships;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;

class ShipCargoItemData extends DataResource
{
    public TradeGoodSymbol $symbol;
    public int $units;
    public string $name;
    public string $description;
}
