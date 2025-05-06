<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Responses;

use AlejandroAPorras\SpaceTraders\Sdk\Data\AgentData;
use AlejandroAPorras\SpaceTraders\Sdk\Data\MetaData;
use Illuminate\Support\Collection;
use Saloon\Http\Response;

class AgentsResponse extends Response
{
    /**
     * @return Collection<int, AgentData>
     */
    public function agents(): Collection
    {
        return collect($this->json('data'))->map(fn (array $agent) => new AgentData($agent));
    }

    public function meta(): MetaData
    {
        return new MetaData($this->json('meta'));
    }
}
