<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Scanning;

use AlejandroAPorras\SpaceTraders\Data\Systems\ChartData;
use AlejandroAPorras\SpaceTraders\Data\Systems\WaypointData;
use Saloon\Http\Response;

class ChartResponse extends Response
{
    public function chart(): ChartData
    {
        return new ChartData($this->json('data.chart'), $this->getConnector());
    }

    public function waypoint(): WaypointData
    {
        return new WaypointData($this->json('data.waypoint'), $this->getConnector());
    }
}
