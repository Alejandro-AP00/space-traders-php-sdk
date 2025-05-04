<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Fleet;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-ship-modules
 *
 * Get the modules installed on a ship.
 */
class GetShipModules extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/my/ships/{$this->shipSymbol}/modules";
	}


	/**
	 * @param string $shipSymbol The symbol of the ship
	 */
	public function __construct(
		protected string $shipSymbol,
	) {
	}
}
