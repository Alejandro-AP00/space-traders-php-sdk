<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\FactionSymbol;
use AlejandroAPorras\SpaceTraders\Enums\ShipRole;

class ShipRegistration extends Resource
{
    public string $name;

    public FactionSymbol $factionSymbol;

    public ShipRole $role;
}
