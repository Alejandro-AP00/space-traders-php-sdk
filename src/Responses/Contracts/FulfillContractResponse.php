<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Contracts;

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Data\Contracts\ContractData;
use Saloon\Http\Response;

class FulfillContractResponse extends Response
{
    public function contract(): ContractData
    {
        return new ContractData($this->json('data.contract'), $this->getConnector());
    }

    public function agent(): AgentData
    {
        return new AgentData($this->json('data.agent'), $this->getConnector());
    }
}
