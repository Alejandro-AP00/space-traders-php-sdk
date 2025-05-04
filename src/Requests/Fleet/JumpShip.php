<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Fleet;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * jump-ship
 *
 * Jump your ship instantly to a target connected waypoint. The ship must be in orbit to execute a
 * jump.
 *
 * A unit of antimatter is purchased and consumed from the market when jumping. The price of
 * antimatter is determined by the market and is subject to change. A ship can only jump to connected
 * waypoints
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
	 * @param string $shipSymbol The ship symbol.
	 */
	public function __construct(
		protected string $shipSymbol,
	) {
	}
}
