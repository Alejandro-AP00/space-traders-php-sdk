<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\ShipReactorSymbol;

class ShipReactor extends Resource
{
    public ShipReactorSymbol $symbol;

    public string $name;

    public string $description;

    public float $condition;

    public float $integrity;

    public int $powerOutput;

    public ShipRequirements $requirements;
}
