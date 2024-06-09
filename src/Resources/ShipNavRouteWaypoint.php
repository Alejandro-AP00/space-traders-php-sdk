<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\WaypointType;

class ShipNavRouteWaypoint extends Resource
{
    public string $symbol;

    public WaypointType $type;

    public string $systemSymbol;

    public int $x;

    public int $y;
}
