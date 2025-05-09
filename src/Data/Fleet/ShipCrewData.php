<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\ShipCrewRotation;

class ShipCrewData extends DataResource
{
    public int $current;

    public int $required;

    public int $capacity;

    public ShipCrewRotation $rotation;

    public int $morale;

    public int $wages;
}
