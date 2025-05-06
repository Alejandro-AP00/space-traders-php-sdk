<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ShipModuleData extends DataResource
{
    public string $symbol;

    public string $name;

    public string $description;

    public int $capacity;

    public ShipRequirementsData $requirements;

    public ?int $range;
}
