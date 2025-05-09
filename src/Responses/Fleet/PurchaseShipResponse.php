<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance;

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipData;
use AlejandroAPorras\SpaceTraders\Data\Systems\ShipyardTransactionData;
use Saloon\Http\Response;

class PurchaseShipResponse extends Response
{
    public function transaction(): ShipyardTransactionData
    {
        return new ShipyardTransactionData($this->json('data.transaction'), $this->getConnector());
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
