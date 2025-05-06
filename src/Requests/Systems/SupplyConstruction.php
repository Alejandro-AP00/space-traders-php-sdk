<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Systems;

use AlejandroAPorras\SpaceTraders\Sdk\Enums\TradeGoodSymbol;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * supply-construction
 *
 * Supply a construction site with the specified good. Requires a waypoint with a property of
 * `isUnderConstruction` to be true.
 *
 * The good must be in your ship's cargo. The good will be removed
 * from your ship's cargo and added to the construction site's materials.
 */
class SupplyConstruction extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/systems/{$this->systemSymbol}/waypoints/{$this->waypointSymbol}/construction/supply";
    }

    /**
     * @param  string  $systemSymbol  The system symbol
     * @param  string  $waypointSymbol  The waypoint symbol
     */
    public function __construct(
        protected string $systemSymbol,
        protected string $waypointSymbol,
        protected string $shipSymbol,
        protected TradeGoodSymbol $tradeSymbol,
        protected int $units,
    ) {}

    protected function defaultBody(): array
    {
        return [
            'shipSymbol' => $this->shipSymbol,
            'tradeSymbol' => $this->tradeSymbol->value,
            'units' => $this->units,
        ];
    }
}
