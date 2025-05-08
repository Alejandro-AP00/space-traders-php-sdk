<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Cargo;

use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipCargoData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\SiphonData;
use Saloon\Http\Response;

class SiphonResourcesResponse extends Response
{
    public function siphon(): SiphonData
    {
        return new SiphonData($this->json('data.siphon'), $this->getConnector());
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
