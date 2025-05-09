<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\ShipConditionEventSymbol;

class ShipConditionEventData extends DataResource
{
    public ShipConditionEventSymbol $symbol;

    public string $component;

    public string $name;

    public string $description;
}
