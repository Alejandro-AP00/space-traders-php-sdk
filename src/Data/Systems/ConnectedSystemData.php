<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\SystemType;

class ConnectedSystemData extends DataResource
{
    public string $symbol;

    public string $sectorSymbol;

    public SystemType $type;

    public string $factionSymbol;

    public int $x;

    public int $y;

    public int $distance;
}
