<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\WaypointTraitSymbol;

class WaypointTraitData extends DataResource
{
    public WaypointTraitSymbol $symbol;

    public string $name;

    public string $description;
}
