<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\ActivityLevel;
use AlejandroAPorras\SpaceTraders\Enums\SupplyLevel;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodType;

class MarketTradeGood extends Resource
{
    public TradeGoodSymbol $symbol;

    public TradeGoodType $type;

    public int $tradeVolume;

    public SupplyLevel $supply;

    public ?ActivityLevel $activity = null;

    public int $purchasePrice;

    public int $sellPrice;
}
