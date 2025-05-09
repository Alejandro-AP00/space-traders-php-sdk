<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance;

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ExtractionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\RepairTransactionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipCargoData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipFuelData;
use AlejandroAPorras\SpaceTraders\Data\Systems\MarketTransactionData;
use Saloon\Http\Response;

class RefuelShipResponse extends Response
{
    public function transaction(): MarketTransactionData
    {
        return new MarketTransactionData($this->json('data.transaction'), $this->getConnector());
    }

    public function agent(): AgentData
    {
        return new AgentData($this->json('data.agent'), $this->getConnector());
    }

    public function fuel() : ShipFuelData {
        return new ShipFuelData($this->json('data.fuel'), $this->getConnector());
    }
}
