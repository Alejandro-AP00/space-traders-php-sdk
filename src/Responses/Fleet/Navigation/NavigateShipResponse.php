<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation;

use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipConditionEventData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipFuelData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipNavData;
use Illuminate\Support\Collection;
use Saloon\Http\Response;

class NavigateShipResponse extends Response
{
    public function nav(): ShipNavData
    {
        return new ShipNavData($this->json('data.nav'), $this->getConnector());
    }

    public function fuel(): ShipFuelData
    {
        return new ShipFuelData($this->json('data.fuel'), $this->getConnector());
    }

    /**
     * @return ShipConditionEventData[]
     */
    public function events(): Collection
    {
        return collect($this->json('data.events'))->map(fn (array $event) => new ShipConditionEventData($event, $this->getConnector()));
    }
}
