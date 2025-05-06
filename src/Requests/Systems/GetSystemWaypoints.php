<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Systems;

use AlejandroAPorras\SpaceTraders\Enums\WaypointTraitSymbol;
use AlejandroAPorras\SpaceTraders\Enums\WaypointType;
use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

/**
 * get-system-waypoints
 *
 * Return a paginated list of all of the waypoints for a given system.
 *
 * If a waypoint is uncharted, it
 * will return the `Uncharted` trait instead of its actual traits.
 */
class GetSystemWaypoints extends Request implements Paginatable
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/systems/{$this->systemSymbol}/waypoints";
	}


	/**
	 * @param string $systemSymbol The system symbol
	 * @param null|int $page What entry offset to request
	 * @param null|int $limit How many entries to return per page
	 * @param null|string $type Filter waypoints by type.
	 * @param null|WaypointTraitSymbol|WaypointTraitSymbol[] $traits Filter waypoints by one or more traits.
	 */
	public function __construct(
		protected string $systemSymbol,
		protected ?WaypointType $type = null,
		protected mixed $traits = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['type' => $this->type, 'traits' => $this->traits]);
	}
}
