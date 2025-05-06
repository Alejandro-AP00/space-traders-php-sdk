<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\ShipCrewRotation;

class ShipCrew extends Resource
{
    public int $current;

    public int $required;

    public int $capacity;

    public ShipCrewRotation $rotation = ShipCrewRotation::STRICT;

    public int $morale;

    public int $wages;
}
