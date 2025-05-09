<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance;

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Data\Contracts\ContractData;
use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ExtractionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\RepairTransactionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipCargoData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipData;
use AlejandroAPorras\SpaceTraders\Data\Systems\MarketTransactionData;
use AlejandroAPorras\SpaceTraders\Data\Systems\ShipyardTransactionData;
use Saloon\Http\Response;

class NegotiateContractResponse extends Response
{
    public function contract(): ContractData
    {
        return new ContractData($this->json('data.contract'), $this->getConnector());
    }
}
