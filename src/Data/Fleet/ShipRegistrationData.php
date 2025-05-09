<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\ShipRole;

class ShipRegistrationData extends DataResource
{
    public string $name;

    public string $factionSymbol;

    public ShipRole $role;
}
