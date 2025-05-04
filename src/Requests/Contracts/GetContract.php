<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Contracts;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-contract
 *
 * Get the details of a contract by ID.
 */
class GetContract extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/my/contracts/{$this->contractId}";
	}


	/**
	 * @param string $contractId The contract ID
	 */
	public function __construct(
		protected string $contractId,
	) {
	}
}
