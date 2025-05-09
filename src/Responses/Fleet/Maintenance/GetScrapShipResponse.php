<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance;

use AlejandroAPorras\SpaceTraders\Data\Fleet\ScrapTransactionData;
use Saloon\Http\Response;

class GetScrapShipResponse extends Response
{
    public function transaction(): ScrapTransactionData
    {
        return new ScrapTransactionData($this->json('data.transaction'), $this->getConnector());
    }
}
