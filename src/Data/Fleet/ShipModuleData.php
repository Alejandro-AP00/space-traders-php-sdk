<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\ShipModuleSymbol;

class ShipModuleData extends DataResource
{
    public ShipModuleSymbol $symbol;

    public int $capacity;

    public ?int $range;

    public string $name;

    public string $description;

    public ShipRequirementsData $requirements;
}
