<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ShipNavRouteWaypointData extends DataResource
{
    public string $symbol;

    public string $type;

    public string $systemSymbol;

    public int $x;

    public int $y;
}
