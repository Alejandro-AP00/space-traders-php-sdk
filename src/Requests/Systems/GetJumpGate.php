<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Systems;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-jump-gate
 *
 * Get jump gate details for a waypoint. Requires a waypoint of type `JUMP_GATE` to use.
 *
 * Waypoints
 * connected to this jump gate can be
 */
class GetJumpGate extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/systems/{$this->systemSymbol}/waypoints/{$this->waypointSymbol}/jump-gate";
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
