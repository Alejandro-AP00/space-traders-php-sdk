<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Cargo;

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipCargoData;
use AlejandroAPorras\SpaceTraders\Data\Systems\MarketTransactionData;
use Saloon\Http\Response;

class SellCargoResponse extends Response
{
    public function cargo(): ShipCargoData
    {
        return new ShipCargoData($this->json('data.cargo'), $this->getConnector());
    }

    public function agent(): AgentData
    {
        return new AgentData($this->json('data.agent'), $this->getConnector());
    }

    public function transaction(): MarketTransactionData
    {
        return new MarketTransactionData($this->json('data.transaction'), $this->getConnector());
    }
}
