<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Globals;

use AlejandroAPorras\SpaceTraders\Data\SpaceTradersData;
use Saloon\Http\Response;

class StatusResponse extends Response
{
    public function spaceTradersStatus(): SpaceTradersData
    {
        return new SpaceTradersData($this->json(), $this->getConnector());
    }
}
