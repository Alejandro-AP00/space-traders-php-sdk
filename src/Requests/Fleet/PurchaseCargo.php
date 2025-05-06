<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet;

use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * purchase-cargo
 *
 * Purchase cargo from a market.
 *
 * The ship must be docked in a waypoint that has `Marketplace` trait,
 * and the market must be selling a good to be able to purchase it.
 *
 * The maximum amount of units of a
 * good that can be purchased in each transaction are denoted by the `tradeVolume` value of the good,
 * which can be viewed by using the Get Market action.
 *
 * Purchased goods are added to the ship's cargo
 * hold.
 */
class PurchaseCargo extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/purchase";
    }

    /**
     * @param  string  $shipSymbol  The ship's symbol.
     */
    public function __construct(
        protected string $shipSymbol,
        protected TradeGoodSymbol $tradeGood,
        protected int $units
    ) {}

    protected function defaultBody(): array
    {
        return [
            'symbol' => $this->tradeGood->value,
            'units' => $this->units,
        ];
    }
}
