<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Data\Systems\MarketTradeGoodData;
use AlejandroAPorras\SpaceTraders\Data\TradeGoodData;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class MarketData extends DataResource
{
    public string $symbol;

    /**
     * @var TradeGood[]
     */
    public array $exports;

    /**
     * @var TradeGood[]
     */
    public array $imports;

    /**
     * @var TradeGood[]
     */
    public array $exchange;

    /**
     * @var MarketTransaction[]
     */
    public array $transactions = [];

    /**
     * @var MarketTradeGood[]
     */
    public array $tradeGoods = [];

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->exports = $this->transformCollection($this->exports ?: [], TradeGoodData::class);
        $this->imports = $this->transformCollection($this->imports ?: [], TradeGoodData::class);
        $this->exchange = $this->transformCollection($this->exchange ?: [], TradeGoodData::class);
        $this->transactions = $this->transformCollection($this->transactions ?: [], MarketTransactionData::class);
        $this->tradeGoods = $this->transformCollection($this->tradeGoods ?: [], MarketTradeGoodData::class);
    }
}
