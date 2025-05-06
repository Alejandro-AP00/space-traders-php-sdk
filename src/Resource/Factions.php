<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Resource;

use AlejandroAPorras\SpaceTraders\Enums\FactionSymbol;
use Saloon\Http\Response;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Factions\GetFaction;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Factions\GetFactions;
use AlejandroAPorras\SpaceTraders\Sdk\Resource;
use Saloon\PaginationPlugin\PagedPaginator;

class Factions extends Resource
{
	/**
	 * @param int $page What entry offset to request
	 * @param int $limit How many entries to return per page
	 */
	public function getFactions(): PagedPaginator
	{
		return $this->connector->paginate(new GetFactions());
	}


	/**
	 * @param FactionSymbol $factionSymbol The faction symbol
	 */
	public function getFaction(FactionSymbol $factionSymbol): Response
	{
		return $this->connector->send(new GetFaction($factionSymbol));
	}
}
