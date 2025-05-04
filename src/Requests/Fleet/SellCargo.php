<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Fleet;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * sell-cargo
 *
 * Sell cargo in your ship to a market that trades this cargo. The ship must be docked in a waypoint
 * that has the `Marketplace` trait in order to use this function.
 */
class SellCargo extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/my/ships/{$this->shipSymbol}/sell";
	}


	/**
	 * @param string $shipSymbol Symbol of a ship.
	 */
	public function __construct(
		protected string $shipSymbol,
	) {
	}
}
