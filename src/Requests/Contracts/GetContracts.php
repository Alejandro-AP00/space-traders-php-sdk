<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Contracts;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

/**
 * get-contracts
 *
 * Return a paginated list of all your contracts.
 */
class GetContracts extends Request implements Paginatable
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/my/contracts";
	}


	/**
	 * @param null|int $page What entry offset to request
	 * @param null|int $limit How many entries to return per page
	 */
	public function __construct() {
	}
}
