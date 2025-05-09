<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\WaypointModifierSymbol;

class WaypointModifierData extends DataResource
{
    public WaypointModifierSymbol $symbol;

    public string $name;

    public string $description;
}
