<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\WaypointType;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class SystemWaypoint extends Resource
{
    public string $symbol;

    public WaypointType $type;

    public int $x;

    public int $y;

    /**
     * @var WaypointOrbital[]
     */
    public array $orbitals;

    public ?string $orbits = null;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->orbitals = $this->transformCollection($this->orbitals ?: [], WaypointOrbital::class);
    }
}
