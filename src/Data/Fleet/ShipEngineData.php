<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ShipEngineData extends DataResource
{
    public string $symbol;

    public string $name;

    public string $description;

    public int $condition;

    public int $speed;

    public ShipRequirementsData $requirements;
}
