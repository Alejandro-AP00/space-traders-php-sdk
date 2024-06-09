<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\SystemType;

class ConnectedSystem
{
    public string $symbol;

    public string $sectorSymbol;

    public SystemType $type;

    public string $factionSymbol;

    public int $x;

    public int $y;

    public int $distance;
}
