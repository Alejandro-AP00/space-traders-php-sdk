<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

class ShipFuel extends Resource
{
    public int $current;

    public int $capacity;

    public ?ShipFuelConsumed $consumed;
}
