<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Scanning;

use AlejandroAPorras\SpaceTraders\Responses\Fleet\Scanning\ShipSystemScanResponse;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * create-ship-system-scan
 *
 * Scan for nearby systems, retrieving information on the systems' distance from the ship and their
 * waypoints. Requires a ship to have the `Sensor Array` mount installed to use.
 *
 * The ship will enter a
 * cooldown after using this function, during which it cannot execute certain actions.
 */
class CreateShipSystemScan extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/scan/systems";
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function __construct(
        protected string $shipSymbol,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return ShipSystemScanResponse::class;
    }
}
