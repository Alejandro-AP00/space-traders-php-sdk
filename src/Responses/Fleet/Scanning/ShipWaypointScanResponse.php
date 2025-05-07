<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Scanning;

use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ScannedWaypoint;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ScannedWaypointData;
use Saloon\Http\Response;

class ShipWaypointScanResponse extends Response
{
    public function cooldown(): CooldownData
    {
        return new CooldownData($this->json('data.cooldown'), $this->getConnector());
    }

    /**
     * Get the scanned waypoints
     *
     * @return array<ScannedWaypoint>
     */
    public function waypoints(): array
    {
        $data = $this->json('data.waypoints');

        return array_map(
            fn (array $waypoint) => new ScannedWaypointData($waypoint, $this->getConnector()),
            $data
        );
    }
}
