<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Resource;

use AlejandroAPorras\SpaceTraders\Sdk\Requests\Agents\GetAgent;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Agents\GetAgents;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Agents\GetMyAgent;
use AlejandroAPorras\SpaceTraders\Sdk\Resource;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\PagedPaginator;

class Agents extends Resource
{
    public function getMyAgent(): Response
    {
        return $this->connector->send(new GetMyAgent);
    }

    public function getAgents(): PagedPaginator
    {
        return $this->connector->paginate(new GetAgents);
    }

    /**
     * @param  string  $agentSymbol  The agent symbol
     */
    public function getAgent(string $agentSymbol): Response
    {
        return $this->connector->send(new GetAgent($agentSymbol));
    }
}
