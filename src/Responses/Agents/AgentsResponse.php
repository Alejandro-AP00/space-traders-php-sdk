<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Agents;

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Traits\HasMetaData;
use Illuminate\Support\Collection;
use Saloon\Http\Response;

class AgentsResponse extends Response
{
    use HasMetaData;

    /**
     * @return Collection<int, AgentData>
     */
    public function agents(): Collection
    {
        return collect($this->json('data'))->map(fn (array $agent) => new AgentData($agent, $this->getConnector()));
    }
}
