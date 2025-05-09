<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Scanning;

use AlejandroAPorras\SpaceTraders\Responses\Fleet\Scanning\ShipWaypointScanResponse;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * create-ship-waypoint-scan
 *
 * Scan for nearby waypoints, retrieving detailed information on each waypoint in range. Scanning
 * uncharted waypoints will allow you to ignore their uncharted state and will list the waypoints'
 * traits.
 *
 * Requires a ship to have the `Sensor Array` mount installed to use.
 *
 * The ship will enter a
 * cooldown after using this function, during which it cannot execute certain actions.
 */
class CreateShipWaypointScan extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/scan/waypoints";
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function __construct(
        protected string $shipSymbol,
    ) {}

    public function resolveResponseClass(): string
    {
        return ShipWaypointScanResponse::class;
    }
}
