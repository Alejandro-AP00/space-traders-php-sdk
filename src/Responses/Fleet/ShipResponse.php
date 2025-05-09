<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance;

use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipData;
use Saloon\Http\Response;

class ShipResponse extends Response
{
    public function ship(): ShipData
    {
        return new ShipData($this->json('data'), $this->getConnector());
    }
}
