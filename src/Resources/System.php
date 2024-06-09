<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\SystemType;

class System extends Resource
{
    public string $symbol;

    public string $sectorSymbol;

    public SystemType $type;

    public int $x;

    public int $y;
}
