<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\FactionSymbol;

class Faction extends Resource
{
    public FactionSymbol $symbol;

    public string $name;

    public string $description;

    public string $headquarters;

    public bool $isRecruiting;
}
