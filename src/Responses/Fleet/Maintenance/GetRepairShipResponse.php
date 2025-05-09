<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance;

use AlejandroAPorras\SpaceTraders\Data\Fleet\RepairTransactionData;
use Saloon\Http\Response;

class GetRepairShipResponse extends Response
{
    public function transaction(): RepairTransactionData
    {
        return new RepairTransactionData($this->json('data.transaction'), $this->getConnector());
    }
}
