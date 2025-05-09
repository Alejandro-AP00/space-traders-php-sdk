<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ShipFuelConsumedData extends DataResource
{
    public int $amount;

    public string $timestamp;
}
