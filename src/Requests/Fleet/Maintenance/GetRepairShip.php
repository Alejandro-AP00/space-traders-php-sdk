<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Maintenance;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-repair-ship
 *
 * Get the cost of repairing a ship.
 */
class GetRepairShip extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/repair";
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function __construct(
        protected string $shipSymbol,
    ) {}
}
