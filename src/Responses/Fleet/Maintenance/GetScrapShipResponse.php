<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance;

use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ExtractionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\RepairTransactionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ScrapTransactionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipCargoData;
use AlejandroAPorras\SpaceTraders\Data\Systems\MarketTransactionData;
use Saloon\Http\Response;

class GetScrapShipResponse extends Response
{
    public function transaction(): ScrapTransactionData
    {
        return new ScrapTransactionData($this->json('data.transaction'), $this->getConnector());
    }
}
