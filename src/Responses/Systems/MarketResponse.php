<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Systems;

use AlejandroAPorras\SpaceTraders\Data\Systems\MarketData;
use Saloon\Http\Response;

class MarketResponse extends Response
{
    public function market(): MarketData
    {
        return new MarketData($this->json('data'), $this->getConnector());
    }
}
