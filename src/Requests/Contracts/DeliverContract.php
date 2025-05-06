<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Contracts;

use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * deliver-contract
 *
 * Deliver cargo to a contract.
 *
 * In order to use this API, a ship must be at the delivery location
 * (denoted in the delivery terms as `destinationSymbol` of a contract) and must have a number of units
 * of a good required by this contract in its cargo.
 *
 * Cargo that was delivered will be removed from the
 * ship's cargo.
 */
class DeliverContract extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/my/contracts/{$this->contractId}/deliver";
	}


	/**
	 * @param string $contractId The ID of the contract.
	 */
	public function __construct(
		protected string $contractId,
        protected string $shipSymbol,
        protected TradeGoodSymbol $tradeSymbol,
        protected int $units,
	) {
	}

    protected function defaultBody(): array
    {
        return [
            'shipSymbol' => $this->shipSymbol,
            'tradeSymbol' => $this->tradeSymbol->value,
            'units' => $this->units,
        ];
    }
}
