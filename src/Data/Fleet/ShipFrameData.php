<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ShipFrameData extends DataResource
{
    public string $symbol;

    public string $name;

    public string $description;

    public int $moduleSlots;

    public int $mountingPoints;

    public int $fuelCapacity;

    public ShipRequirementsData $requirements;

    public int $condition;
}
