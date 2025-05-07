<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Systems;

use AlejandroAPorras\SpaceTraders\Data\Systems\WaypointData;
use Saloon\Http\Response;

class WaypointResponse extends Response
{
    public function waypoint(): WaypointData
    {
        return new WaypointData($this->json('data'), $this->getConnector());
    }
}
