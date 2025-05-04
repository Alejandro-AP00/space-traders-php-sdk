<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Fleet;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * jettison
 *
 * Jettison cargo from your ship's cargo hold.
 */
class Jettison extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/my/ships/{$this->shipSymbol}/jettison";
	}


	/**
	 * @param string $shipSymbol The ship symbol.
	 */
	public function __construct(
		protected string $shipSymbol,
	) {
	}
}
