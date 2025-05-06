<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ShipRegistrationData extends DataResource
{
    public string $name;

    public string $factionSymbol;

    public string $role;
}
