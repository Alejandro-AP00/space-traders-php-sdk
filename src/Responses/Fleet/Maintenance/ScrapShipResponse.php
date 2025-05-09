<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance;

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ScrapTransactionData;
use Saloon\Http\Response;

class ScrapShipResponse extends Response
{
    public function transaction(): ScrapTransactionData
    {
        return new ScrapTransactionData($this->json('data.transaction'), $this->getConnector());
    }

    public function agent(): AgentData
    {
        return new AgentData($this->json('data.agent'), $this->getConnector());
    }
}
