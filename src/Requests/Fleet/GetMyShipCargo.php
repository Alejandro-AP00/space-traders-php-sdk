<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-my-ship-cargo
 *
 * Retrieve the cargo of a ship under your agent's ownership.
 */
class GetMyShipCargo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/cargo";
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship.
     */
    public function __construct(
        protected string $shipSymbol,
    ) {}
}
