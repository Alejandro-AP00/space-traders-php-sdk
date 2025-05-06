<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\ShipFrameSymbol;

class ShipFrame extends Resource
{
    public ShipFrameSymbol $symbol;

    public string $name;

    public string $description;

    public float $condition;

    public float $integrity;

    public int $moduleSlots;

    public int $mountingPoints;

    public int $fuelCapacity;

    public ShipRequirements $requirements;
}
