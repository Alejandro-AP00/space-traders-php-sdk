<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Fleet;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * remove-ship-module
 *
 * Remove a module from a ship. The module will be placed in cargo.
 */
class RemoveShipModule extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/my/ships/{$this->shipSymbol}/modules/remove";
	}


	/**
	 * @param string $shipSymbol The symbol of the ship
	 */
	public function __construct(
		protected string $shipSymbol,
        protected string $symbol
	) {
	}

    protected function defaultBody(): array
    {
        return [
            'symbol' => $this->symbol,
        ];
    }
}
