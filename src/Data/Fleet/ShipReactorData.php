<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ShipReactorData extends DataResource
{
    public string $symbol;

    public string $name;

    public string $description;

    public int $condition;

    public int $powerOutput;

    public ShipRequirementsData $requirements;
}
