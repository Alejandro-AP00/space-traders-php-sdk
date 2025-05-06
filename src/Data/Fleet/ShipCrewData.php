<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ShipCrewData extends DataResource
{
    public int $current;

    public int $required;

    public int $capacity;

    public string $rotation;

    public int $morale;

    public int $wages;
}
