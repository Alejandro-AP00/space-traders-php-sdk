<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\ShipNavFlightMode;
use AlejandroAPorras\SpaceTraders\Enums\ShipNavStatus;

class ShipNav extends Resource
{
    public string $systemSymbol;

    public string $waypointSymbol;

    public ShipNavRoute $route;

    public ShipNavStatus $status;

    public ShipNavFlightMode $flightMode = ShipNavFlightMode::CRUISE;
}
