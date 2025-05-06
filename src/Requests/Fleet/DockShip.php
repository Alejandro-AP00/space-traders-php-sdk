<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Fleet;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * dock-ship
 *
 * Attempt to dock your ship at its current location. Docking will only succeed if your ship is capable
 * of docking at the time of the request.
 *
 * Docked ships can access elements in their current location,
 * such as the market or a shipyard, but cannot do actions that require the ship to be above surface
 * such as navigating or extracting.
 *
 * The endpoint is idempotent - successive calls will succeed even
 * if the ship is already docked.
 */
class DockShip extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/dock";
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship.
     */
    public function __construct(
        protected string $shipSymbol,
    ) {}
}
