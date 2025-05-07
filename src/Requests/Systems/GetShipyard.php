<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Systems;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use AlejandroAPorras\SpaceTraders\Responses\Systems\ShipyardResponse;

/**
 * get-shipyard
 *
 * Get the shipyard for a waypoint. Requires a waypoint that has the `Shipyard` trait to use. Send a
 * ship to the waypoint to access data on ships that are currently available for purchase and recent
 * transactions.
 */
class GetShipyard extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/systems/{$this->systemSymbol}/waypoints/{$this->waypointSymbol}/shipyard";
    }

    public function resolveResponseClass(): string
    {
        return ShipyardResponse::class;
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
