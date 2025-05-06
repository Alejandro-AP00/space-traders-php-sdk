<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Systems;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-construction
 *
 * Get construction details for a waypoint. Requires a waypoint with a property of
 * `isUnderConstruction` to be true.
 */
class GetConstruction extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/systems/{$this->systemSymbol}/waypoints/{$this->waypointSymbol}/construction";
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
