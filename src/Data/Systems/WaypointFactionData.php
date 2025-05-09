<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\FactionSymbol;

class WaypointFactionData extends DataResource
{
    public FactionSymbol $symbol;
}
