<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Systems;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-market
 *
 * Retrieve imports, exports and exchange data from a marketplace. Requires a waypoint that has the
 * `Marketplace` trait to use.
 *
 * Send a ship to the waypoint to access trade good prices and recent
 * transactions. Refer to the [Market Overview
 * page](https://docs.spacetraders.io/game-concepts/markets) to gain better a understanding of the
 * market in the game.
 */
class GetMarket extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/systems/{$this->systemSymbol}/waypoints/{$this->waypointSymbol}/market";
    }

    /**
     * @param  string  $systemSymbol  The system symbol
     * @param  string  $waypointSymbol  The waypoint symbol
     */
    public function __construct(
        protected string $systemSymbol,
        protected string $waypointSymbol,
    ) {}
}
