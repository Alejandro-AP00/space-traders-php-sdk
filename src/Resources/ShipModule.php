<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\ShipModuleSymbol;

class ShipModule extends Resource
{
    public ShipModuleSymbol $symbol;

    public ?int $capacity = null;

    public ?int $range = null;

    public string $name;

    public string $description;

    public ShipRequirements $requirements;
}
