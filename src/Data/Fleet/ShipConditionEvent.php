<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\ShipComponent;
use AlejandroAPorras\SpaceTraders\Enums\ShipConditionEventSymbol;

class ShipConditionEvent extends Resource
{
    public ShipConditionEventSymbol $symbol;

    public ShipComponent $component;

    public string $name;

    public string $description;
}
