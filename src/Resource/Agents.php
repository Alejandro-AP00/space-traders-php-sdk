<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Resource;

use AlejandroAPorras\SpaceTraders\Sdk\Requests\Agents\GetAgent;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Agents\GetAgents;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Agents\GetMyAgent;
use AlejandroAPorras\SpaceTraders\Sdk\Resource;
use Saloon\Http\Response;

class Agents extends Resource
{
	public function getMyAgent(): Response
	{
		return $this->connector->send(new GetMyAgent());
	}


	/**
	 * @param int $page What entry offset to request
	 * @param int $limit How many entries to return per page
	 */
	public function getAgents(?int $page, ?int $limit): Response
	{
		return $this->connector->send(new GetAgents($page, $limit));
	}


	/**
	 * @param string $agentSymbol The agent symbol
	 */
	public function getAgent(string $agentSymbol): Response
	{
		return $this->connector->send(new GetAgent($agentSymbol));
	}
}
