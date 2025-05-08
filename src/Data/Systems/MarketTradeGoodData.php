<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\ActivityLevel;
use AlejandroAPorras\SpaceTraders\Enums\SupplyLevel;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodType;

class MarketTradeGoodData extends DataResource
{
    public TradeGoodSymbol $symbol;

    public TradeGoodType $type;

    public int $tradeVolume;

    public SupplyLevel $supply;

    public ?ActivityLevel $activity = null;

    public int $purchasePrice;

    public int $sellPrice;
}
