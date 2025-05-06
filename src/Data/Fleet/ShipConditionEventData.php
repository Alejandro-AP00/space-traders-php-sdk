<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ShipConditionEventData extends DataResource
{
    public string $symbol;

    public string $component;

    public string $name;

    public string $description;
}
