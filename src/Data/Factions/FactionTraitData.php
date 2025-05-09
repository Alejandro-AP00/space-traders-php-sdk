<?php

namespace AlejandroAPorras\SpaceTraders\Data\Factions;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\FactionTraitSymbol;

class FactionTraitData extends DataResource
{
    public FactionTraitSymbol $symbol;

    public string $name;

    public string $description;
}
