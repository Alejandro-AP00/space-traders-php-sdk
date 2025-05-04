<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Factions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

/**
 * get-factions
 *
 * Return a paginated list of all the factions in the game.
 */
class GetFactions extends Request implements Paginatable
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/factions";
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
