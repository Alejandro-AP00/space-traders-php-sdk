<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation;

use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipFuelData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipNavData;
use Saloon\Http\Response;

class WarpShipResponse extends Response
{
    public function nav(): ShipNavData
    {
        return new ShipNavData($this->json('data.nav'), $this->getConnector());
    }

    public function fuel(): ShipFuelData
    {
        return new ShipFuelData($this->json('data.fuel'), $this->getConnector());
    }

    public function cooldown(): ?CooldownData
    {
        $cooldown = $this->json('data.cooldown');

        if (! $cooldown) {
            return null;
        }

        return new CooldownData($cooldown, $this->getConnector());
    }
}
