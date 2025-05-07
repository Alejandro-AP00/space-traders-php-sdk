<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Data\Systems\WaypointOrbitalData;
use AlejandroAPorras\SpaceTraders\Data\Systems\WaypointTraitData;
use AlejandroAPorras\SpaceTraders\Data\Systems\ChartData;
use AlejandroAPorras\SpaceTraders\Data\Factions\FactionData;
use AlejandroAPorras\SpaceTraders\Enums\WaypointType;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class ScannedWaypointData extends DataResource
{
    public string $symbol;

    public WaypointType $type;

    public string $systemSymbol;

    public int $x;

    public int $y;

    /**
     * @var WaypointOrbitalData[]
     */
    public array $orbitals;

    public ?FactionData $faction;

    /**
     * @var WaypointTraitData[]
     */
    public array $traits;

    public ?ChartData $chart;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        if (isset($this->orbitals)) {
            $this->orbitals = $this->transformCollection($this->orbitals, WaypointOrbitalData::class);
        }

        if (isset($this->traits)) {
            $this->traits = $this->transformCollection($this->traits, WaypointTraitData::class);
        }
    }
}
