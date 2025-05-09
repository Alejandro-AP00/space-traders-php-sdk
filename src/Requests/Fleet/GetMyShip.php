<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet;

use AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance\ShipResponse;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-my-ship
 *
 * Retrieve the details of a ship under your agent's ownership.
 */
class GetMyShip extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}";
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship.
     */
    public function __construct(
        protected string $shipSymbol,
    ) {}

    public function resolveResponseClass(): string
    {
        return ShipResponse::class;
    }
}
