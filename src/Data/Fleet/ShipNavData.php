<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\ShipNavFlightMode;
use AlejandroAPorras\SpaceTraders\Enums\ShipNavStatus;

class ShipNavData extends DataResource
{
    public ShipNavStatus $status;

    public ShipNavFlightMode $flightMode;

    public ShipNavRouteData $route;

    public string $waypointSymbol;

    public ?string $departureTime;

    public ?string $arrivalTime;
}
