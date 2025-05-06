<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ShipFuelData extends DataResource
{
    public int $current;

    public int $capacity;

    public ?ShipFuelConsumedData $consumed;
}
