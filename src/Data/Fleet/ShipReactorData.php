<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\ShipReactorSymbol;

class ShipReactorData extends DataResource
{
    public ShipReactorSymbol $symbol;

    public string $name;

    public string $description;

    public float $condition;

    public float $integrity;

    public int $powerOutput;

    public ShipRequirementsData $requirements;

    public float $quality;
}
