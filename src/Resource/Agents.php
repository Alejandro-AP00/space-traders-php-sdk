<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Resource;

use AlejandroAPorras\SpaceTraders\Sdk\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Agents\GetAgent;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Agents\GetAgents;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Agents\GetMyAgent;
use AlejandroAPorras\SpaceTraders\Sdk\Resource;
use AlejandroAPorras\SpaceTraders\Sdk\Responses\AgentResponse;
use AlejandroAPorras\SpaceTraders\Sdk\Responses\AgentsResponse;
use Saloon\PaginationPlugin\PagedPaginator;

class Agents extends Resource
{
    public function getMyAgent(): AgentData
    {
        return $this->connector->send(new GetMyAgent)->agent();
    }

    public function getAgents(): PagedPaginator
    {
        return $this->connector->paginate(new GetAgents);
    }

    /**
     * @param  string  $agentSymbol  The agent symbol
     */
    public function getAgent(string $agentSymbol): AgentData
    {
        return $this->connector->send(new GetAgent($agentSymbol))->agent();
    }
}
