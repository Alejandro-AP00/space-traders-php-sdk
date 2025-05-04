<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Resource;

use Saloon\Http\Response;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Factions\GetFaction;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Factions\GetFactions;
use AlejandroAPorras\SpaceTraders\Sdk\Resource;

class Factions extends Resource
{
	/**
	 * @param int $page What entry offset to request
	 * @param int $limit How many entries to return per page
	 */
	public function getFactions(?int $page, ?int $limit): Response
	{
		return $this->connector->send(new GetFactions($page, $limit));
	}


	/**
	 * @param string $factionSymbol The faction symbol
	 */
	public function getFaction(string $factionSymbol): Response
	{
		return $this->connector->send(new GetFaction($factionSymbol));
	}
}
