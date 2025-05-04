<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Agents;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-agents
 *
 * Fetch agents details.
 */
class GetAgents extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/agents";
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
