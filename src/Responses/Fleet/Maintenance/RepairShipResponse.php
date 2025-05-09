<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance;

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\RepairTransactionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipData;
use Saloon\Http\Response;

class RepairShipResponse extends Response
{
    public function transaction(): RepairTransactionData
    {
        return new RepairTransactionData($this->json('data.transaction'), $this->getConnector());
    }

    public function agent(): AgentData
    {
        return new AgentData($this->json('data.agent'), $this->getConnector());
    }

    public function ship(): ShipData
    {
        return new ShipData($this->json('data.ship'), $this->getConnector());
    }
}
