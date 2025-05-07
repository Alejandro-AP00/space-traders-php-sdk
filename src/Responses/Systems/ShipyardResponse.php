<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Systems;

use AlejandroAPorras\SpaceTraders\Data\Systems\ShipyardData;
use Saloon\Http\Response;

class ShipyardResponse extends Response
{
    public function shipyard(): ShipyardData
    {
        return new ShipyardData($this->json('data'), $this->getConnector());
    }
}
