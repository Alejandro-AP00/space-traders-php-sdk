<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Fleet;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

/**
 * get-my-ships
 *
 * Return a paginated list of all of ships under your agent's ownership.
 */
class GetMyShips extends Request implements Paginatable
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/my/ships";
	}


	/**
	 * @param null|int $page What entry offset to request
	 * @param null|int $limit How many entries to return per page
	 */
	public function __construct(
		protected ?int $page = null,
		protected ?int $limit = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page, 'limit' => $this->limit]);
	}
}
