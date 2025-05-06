<?php

namespace AlejandroAPorras\SpaceTraders\Responses;

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use Saloon\Http\Response;

class AgentResponse extends Response
{
    public function agent(): AgentData
    {
        return new AgentData($this->json('data'));
    }
}
