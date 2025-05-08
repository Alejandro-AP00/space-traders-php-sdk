<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Navigation;

use AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation\NavigateShipResponse;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * navigate-ship
 *
 * Navigate to a target destination. The ship must be in orbit to use this function. The destination
 * waypoint must be within the same system as the ship's current location. Navigating will consume the
 * necessary fuel from the ship's manifest based on the distance to the target waypoint.
 *
 * The returned
 * response will detail the route information including the expected time of arrival. Most ship actions
 * are unavailable until the ship has arrived at it's destination.
 *
 * To travel between systems, see the
 * ship's Warp or Jump actions.
 */
class NavigateShip extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/navigate";
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function __construct(
        protected string $shipSymbol,
        protected string $waypointSymbol
    ) {}

    protected function defaultBody(): array
    {
        return [
            'waypointSymbol' => $this->waypointSymbol,
        ];
    }

    public function resolveResponseClass(): string
    {
        return NavigateShipResponse::class;
    }
}
