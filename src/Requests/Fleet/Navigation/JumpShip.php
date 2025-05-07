<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Navigation;

use AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation\JumpShipResponse;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * jump-ship
 *
 * Jump your ship instantly to a target system. The ship must be in orbit to use this function, and
 * must have the correct drive installed that allows it to jump between systems.
 *
 * When used while in orbit
 * of a Jump Gate waypoint, this command allows your ship to jump to any system connected to that Jump
 * Gate.
 *
 * When used elsewhere, this command allows your ship to jump to any system within range of your
 * ship's inbuilt drives.
 */
class JumpShip extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/jump";
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
        return JumpShipResponse::class;
    }
}
