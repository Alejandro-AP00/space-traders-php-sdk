<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance;

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ExtractionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\RepairTransactionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ScrapTransactionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipCargoData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipData;
use AlejandroAPorras\SpaceTraders\Data\Systems\MarketTransactionData;
use Saloon\Http\Response;

class ShipCooldownResponse extends Response
{
    public function cooldown(): ?CooldownData
    {
        if($this->status() === 204){
            return null;
        }

        return new CooldownData($this->json('data'), $this->getConnector());
    }
}
