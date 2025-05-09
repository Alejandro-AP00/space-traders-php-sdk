<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance;

use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ExtractionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\RepairTransactionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipCargoData;
use AlejandroAPorras\SpaceTraders\Data\Systems\MarketTransactionData;
use Saloon\Http\Response;

class GetRepairShipResponse extends Response
{
    public function transaction(): RepairTransactionData
    {
        return new RepairTransactionData($this->json('data.transaction'), $this->getConnector());
    }
}
