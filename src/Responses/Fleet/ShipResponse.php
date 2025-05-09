<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance;

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ExtractionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\RepairTransactionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipCargoData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipData;
use AlejandroAPorras\SpaceTraders\Data\Systems\MarketTransactionData;
use AlejandroAPorras\SpaceTraders\Data\Systems\ShipyardTransactionData;
use Saloon\Http\Response;

class ShipResponse extends Response
{
    public function ship() : ShipData {
        return new ShipData($this->json('data'), $this->getConnector());
    }
}
