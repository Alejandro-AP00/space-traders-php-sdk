<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Cargo;

use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ExtractionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipCargoData;
use Saloon\Http\Response;

class ExtractResourcesResponse extends Response
{
    public function extraction(): ExtractionData
    {
        return new ExtractionData($this->json('data.extraction'), $this->getConnector());
    }

    public function cargo(): ShipCargoData
    {
        return new ShipCargoData($this->json('data.cargo'), $this->getConnector());
    }

    public function cooldown(): CooldownData
    {
        return new CooldownData($this->json('data.cooldown'), $this->getConnector());
    }
}
