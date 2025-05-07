<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation;

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipNavData;
use AlejandroAPorras\SpaceTraders\Data\Systems\MarketTransactionData;
use Saloon\Http\Response;

class JumpShipResponse extends Response
{
    public function nav(): ShipNavData
    {
        return new ShipNavData($this->json('data.nav'), $this->getConnector());
    }

    public function cooldown(): CooldownData
    {
        return new CooldownData($this->json('data.cooldown'), $this->getConnector());
    }

    public function transaction(): MarketTransactionData
    {
        return new MarketTransactionData($this->json('data.transaction'), $this->getConnector());
    }

    public function agent(): AgentData
    {
        return new AgentData($this->json('data.agent'), $this->getConnector());
    }
}
