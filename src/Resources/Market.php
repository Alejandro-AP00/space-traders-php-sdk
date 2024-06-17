<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\SpaceTraders;

class Market extends Resource
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

        $this->exports = $this->transformCollection($this->exports ?: [], TradeGood::class);
        $this->imports = $this->transformCollection($this->imports ?: [], TradeGood::class);
        $this->exchange = $this->transformCollection($this->exchange ?: [], TradeGood::class);
        $this->transactions = $this->transformCollection($this->transactions ?: [], MarketTransaction::class);
        $this->tradeGoods = $this->transformCollection($this->tradeGoods ?: [], MarketTradeGood::class);
    }
}
