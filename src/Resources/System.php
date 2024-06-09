<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\SystemType;
use AlejandroAPorras\SpaceTraders\SpaceTraders;
use AlejandroAPorras\SpaceTraders\Support\PaginatedResults;

class System extends Resource
{
    public string $symbol;

    public string $sectorSymbol;

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

        $this->waypoints = $this->transformCollection($this->waypoints ?: [], SystemWaypoint::class);
        $this->factions = $this->transformCollection($this->factions ?: [], SystemFaction::class);
    }

    public function waypoints(): PaginatedResults
    {
        return $this->spaceTraders->waypoints($this->symbol);
    }
}
