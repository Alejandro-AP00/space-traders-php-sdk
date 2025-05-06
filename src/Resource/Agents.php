<?php

namespace AlejandroAPorras\SpaceTraders\Resource;

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Requests\Agents\GetAgent;
use AlejandroAPorras\SpaceTraders\Requests\Agents\GetAgents;
use AlejandroAPorras\SpaceTraders\Requests\Agents\GetMyAgent;
use AlejandroAPorras\SpaceTraders\Resource;
use AlejandroAPorras\SpaceTraders\Responses\Agents\AgentResponse;
use AlejandroAPorras\SpaceTraders\Responses\Agents\AgentsResponse;
use Saloon\PaginationPlugin\PagedPaginator;

class Agents extends Resource
{
    public function getMyAgent(): AgentResponse
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
    public function getAgent(string $agentSymbol): AgentResponse
    {
        return $this->connector->send(new GetAgent($agentSymbol));
    }
}
