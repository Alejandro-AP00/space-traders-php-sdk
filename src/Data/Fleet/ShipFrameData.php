<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\ShipFrameSymbol;

class ShipFrameData extends DataResource
{
    public ShipFrameSymbol $symbol;

    public string $name;

    public string $description;

    public float $condition;

    public float $integrity;

    public int $moduleSlots;

    public int $mountingPoints;

    public int $fuelCapacity;

    public ShipRequirementsData $requirements;

    public int $quality;
}
