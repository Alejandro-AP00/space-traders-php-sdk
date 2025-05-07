<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Navigation;

use AlejandroAPorras\SpaceTraders\Enums\ShipNavFlightMode;
use AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation\PatchShipNavResponse;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * patch-ship-nav
 *
 * Update the nav configuration of a ship.
 *
 * Currently only supports configuring the Flight Mode of the
 * ship, which affects its speed and fuel consumption.
 */
class PatchShipNav extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/nav";
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function __construct(
        protected string $shipSymbol,
        protected ShipNavFlightMode $flightMode
    ) {}

    protected function defaultBody(): array
    {
        return [
            'flightMode' => $this->flightMode->value,
        ];
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return PatchShipNavResponse::class;
    }
}
