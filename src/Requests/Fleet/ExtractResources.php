<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Fleet;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * extract-resources
 *
 * Extract resources from a waypoint that can be extracted, such as asteroid fields, into your ship.
 * Send an optional survey as the payload to target specific yields.
 *
 * The ship must be in orbit to be
 * able to extract and must have mining equipments installed that can extract goods, such as the `Gas
 * Siphon` mount for gas-based goods or `Mining Laser` mount for ore-based goods.
 *
 * The survey property
 * is now deprecated. See the `extract/survey` endpoint for more details.
 */
class ExtractResources extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/my/ships/{$this->shipSymbol}/extract";
	}


	/**
	 * @param string $shipSymbol The ship symbol.
	 */
	public function __construct(
		protected string $shipSymbol,
	) {
	}
}
