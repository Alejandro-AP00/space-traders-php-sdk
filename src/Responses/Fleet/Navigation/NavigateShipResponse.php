<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation;

use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipConditionEventData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipFuelData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipNavData;
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
    public function events(): array
    {
        $data = $this->json('data.events') ?? [];

        return array_map(
            fn (array $event) => new ShipConditionEventData($event, $this->getConnector()),
            $data
        );
    }
}
