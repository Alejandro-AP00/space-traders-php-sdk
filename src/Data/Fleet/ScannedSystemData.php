<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\SystemType;

class ScannedSystemData extends DataResource
{
    public string $symbol;

    public string $sectorSymbol;

    public SystemType $type;

    public int $x;

    public int $y;

    public int $distance;
}
