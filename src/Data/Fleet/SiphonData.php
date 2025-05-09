<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class SiphonData extends DataResource
{
    public string $shipSymbol;

    public SiphonYieldData $yield;
}
