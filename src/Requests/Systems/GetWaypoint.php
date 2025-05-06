<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Systems;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-waypoint
 *
 * View the details of a waypoint.
 *
 * If the waypoint is uncharted, it will return the 'Uncharted' trait
 * instead of its actual traits.
 */
class GetWaypoint extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/systems/{$this->systemSymbol}/waypoints/{$this->waypointSymbol}";
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
