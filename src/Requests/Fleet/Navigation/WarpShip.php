<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Navigation;

use AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation\WarpShipResponse;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * warp-ship
 *
 * Warp your ship to a target destination in another system. The ship must be in orbit to use this
 * function and must have the correct drive installed that allows it to execute warps.
 *
 * The ship will
 * consume fuel based on the distance to the target system. The ship will arrive several seconds later
 * based on the time it takes to reach the destination system.
 *
 * During warp your ship will be
 * vulnerable to attacks in the system you are warping to.
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

    public function createDtoFromResponse(Response $response): mixed
    {
        return WarpShipResponse::class;
    }
}
