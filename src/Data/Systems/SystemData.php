<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\SystemType;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class SystemData extends DataResource
{
    public string $symbol;

    public string $sectorSymbol;

    public string $constellation;

    public string $name;

    public SystemType $type;

    public int $x;

    public int $y;

    /**
     * @var SystemWaypoint[]
     */
    public array $waypoints;

    /**
     * @var SystemFaction[]
     */
    public array $factions;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->waypoints = $this->transformCollection($this->waypoints ?: [], SystemWaypointData::class);
        $this->factions = $this->transformCollection($this->factions ?: [], SystemFactionData::class);
    }

    public function waypoints()
    {
        return $this->spaceTraders->systems()->getSystemWaypoints($this->symbol);
    }
}
