<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Systems;

use AlejandroAPorras\SpaceTraders\Data\Systems\WaypointData;
use AlejandroAPorras\SpaceTraders\Traits\HasMetaData;
use Illuminate\Support\Collection;
use Saloon\Http\Response;

class SystemWaypointsResponse extends Response
{
    use HasMetaData;

    /**
     * @return Collection<int, WaypointData>
     */
    public function waypoints(): Collection
    {
        return collect($this->json('data'))->map(fn (array $waypoint) => new WaypointData($waypoint, $this->getConnector()));
    }
}
