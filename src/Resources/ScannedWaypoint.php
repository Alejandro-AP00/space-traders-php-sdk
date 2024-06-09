<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\WaypointType;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class ScannedWaypoint extends Resource
{
    public string $symbol;

    public WaypointType $type;

    public string $systemSymbol;

    public int $x;

    public int $y;

    /**
     * @var WaypointOrbital[]
     */
    public array $orbitals;

    public Faction $faction;

    public array $traits;

    public Chart $chart;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->orbitals = $this->transformCollection($this->orbitals ?: [], WaypointOrbital::class);
        $this->traits = $this->transformCollection($this->traits ?: [], WaypointTrait::class);
    }
}
