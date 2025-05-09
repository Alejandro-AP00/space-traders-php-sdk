<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Navigation;

use AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation\OrbitShipResponse;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orbit-ship
 *
 * Attempt to move your ship into orbit at its current location. The request will only succeed if your
 * ship is capable of moving into orbit at the time of the request.
 *
 * Orbiting ships are able to do
 * actions that require the ship to be above surface such as navigating or extracting, but cannot
 * access elements in their current waypoint, such as the market or a shipyard.
 *
 * The endpoint is
 * idempotent - successive calls will succeed even if the ship is already in orbit.
 */
class OrbitShip extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/orbit";
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship.
     */
    public function __construct(
        protected string $shipSymbol,
    ) {}

    public function resolveResponseClass(): string
    {
        return OrbitShipResponse::class;
    }
}
