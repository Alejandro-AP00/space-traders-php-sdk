<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Maintenance;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repair-ship
 *
 * Repair a ship, restoring the ship to maximum condition. The ship must be docked at a waypoint that
 * has the `Shipyard` trait in order to use this function. To preview the cost of repairing the ship,
 * use the Get action.
 */
class RepairShip extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

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
