<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\ShipEngineSymbol;

class ShipEngine extends Resource
{
    public ShipEngineSymbol $symbol;

    public string $name;

    public string $description;

    public float $condition;

    public float $integrity;

    public int $speed;

    public ShipRequirements $requirements;
}
