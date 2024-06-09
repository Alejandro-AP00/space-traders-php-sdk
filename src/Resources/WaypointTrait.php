<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\WaypointTraitSymbol;

class WaypointTrait extends Resource
{
    public WaypointTraitSymbol $symbol;

    public string $name;

    public string $description;
}
