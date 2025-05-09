<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Systems;

use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipCargoData;
use AlejandroAPorras\SpaceTraders\Data\Systems\ConstructionData;
use Saloon\Http\Response;

class SupplyConstructionResponse extends Response
{
    public function construction(): ConstructionData
    {
        return new ConstructionData($this->json('data.construction'), $this->getConnector());
    }

    public function cargo(): ShipCargoData
    {
        return new ShipCargoData($this->json('data.cargo'), $this->getConnector());
    }
}
