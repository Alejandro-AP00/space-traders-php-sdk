<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\WaypointModifierSymbol;

class WaypointModifier extends Resource
{
    public WaypointModifierSymbol $symbol;

    public string $name;

    public string $description;
}
