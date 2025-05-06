<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Responses;

use AlejandroAPorras\SpaceTraders\Sdk\Data\AgentData;
use Saloon\Http\Response;

class AgentResponse extends Response
{
    public function agent(): AgentData
    {
        return AgentData::from($this->json('data'));
    }
}
