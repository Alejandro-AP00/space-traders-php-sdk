<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;
use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\Enums\TransactionType;

class MarketTransactionData extends DataResource
{
    public string $waypointSymbol;

    public string $shipSymbol;

    public TradeGoodSymbol $tradeSymbol;

    public TransactionType $type;

    public int $units;

    public int $pricePerUnit;

    public int $totalPrice;

    public string $timestamp;
}
