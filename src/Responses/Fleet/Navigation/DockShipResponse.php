<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation;

use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipNavData;
use Saloon\Http\Response;

class DockShipResponse extends Response
{
    public function nav(): ShipNavData
    {
        return new ShipNavData($this->json('data.nav'), $this->getConnector());
    }
}
