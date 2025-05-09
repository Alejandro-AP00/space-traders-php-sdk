<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ShipNavRouteData extends DataResource
{
    public ShipNavRouteWaypointData $destination;

    public ShipNavRouteWaypointData $departure;

    public string $departureTime;

    public string $arrival;
}
