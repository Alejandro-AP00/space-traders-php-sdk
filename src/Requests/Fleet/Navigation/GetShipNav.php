<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Navigation;

use AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation\ShipNavResponse;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * get-ship-nav
 *
 * Get the current nav status of a ship.
 */
class GetShipNav extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/nav";
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function __construct(
        protected string $shipSymbol,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return ShipNavResponse::class;
    }
}
