<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Responses;

use AlejandroAPorras\SpaceTraders\Sdk\Data\Agents\AgentData;
use Saloon\Http\Response;

class AgentResponse extends Response
{
    public function agent(): AgentData
    {
        return new AgentData($this->json('data'));
    }
}
