<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\ShipEngineSymbol;

class ShipEngineData extends DataResource
{
    public ShipEngineSymbol $symbol;

    public string $name;

    public string $description;

    public float $condition;

    public float $integrity;

    public int $speed;

    public ShipRequirementsData $requirements;

    public float $quality;
}
