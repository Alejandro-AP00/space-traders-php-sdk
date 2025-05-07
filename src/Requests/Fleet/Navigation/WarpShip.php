<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Navigation;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * warp-ship
 *
 * Warp your ship to a target destination in another system. The ship must be in orbit to use this
 * function and must have the `Warp Drive` module installed. Warping will consume the necessary fuel
 * from the ship's manifest.
 *
 * The returned response will detail the route information including the
 * expected time of arrival. Most ship actions are unavailable until the ship has arrived at its
 * destination.
 */
class WarpShip extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/warp";
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
}
