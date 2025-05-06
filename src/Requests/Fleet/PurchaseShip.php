<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Fleet;

use AlejandroAPorras\SpaceTraders\Enums\ShipType;
use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * purchase-ship
 *
 * Purchase a ship from a Shipyard. In order to use this function, a ship under your agent's ownership
 * must be in a waypoint that has the `Shipyard` trait, and the Shipyard must sell the type of the
 * desired ship.
 *
 * Shipyards typically offer ship types, which are predefined templates of ships that
 * have dedicated roles. A template comes with a preset of an engine, a reactor, and a frame. It may
 * also include a few modules and mounts.
 */
class PurchaseShip extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/my/ships";
	}


	public function __construct(protected ShipType $shipType, protected string $waypointSymbol)
	{
	}

    protected function defaultBody(): array
    {
        return [
            'shipType' => $this->shipType->value,
            'waypointSymbol' => $this->waypointSymbol,
        ];
    }
}
