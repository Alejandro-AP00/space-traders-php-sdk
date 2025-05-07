<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Maintenance;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * refuel-ship
 *
 * Refuel your ship by buying fuel from the local market.
 *
 * Requires the ship to be docked in a waypoint
 * that has the `Marketplace` trait, and the market must be selling fuel in order to refuel.
 *
 * Each fuel
 * bought from the market replenishes 100 units in your ship's fuel.
 *
 * Ships will always be refuel to
 * their frame's maximum fuel capacity when using this action.
 */
class RefuelShip extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/refuel";
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function __construct(
        protected string $shipSymbol,
        protected int $units = 1,
        protected bool $fromCargo = false,
    ) {}

    protected function defaultBody(): array
    {
        return [
            'units' => $this->units,
            'fromCargo' => $this->fromCargo,
        ];
    }
}
