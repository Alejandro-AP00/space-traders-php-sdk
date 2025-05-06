<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

class ShipNavRoute extends Resource
{
    public string $departureTime;

    public ShipNavRouteWaypoint $destination;

    public ShipNavRouteWaypoint $origin;

    public string $arrival;
}
