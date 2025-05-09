<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ExtractionData extends DataResource
{
    public string $shipSymbol;

    public ExtractionYieldData $yield;
}
