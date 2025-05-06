<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ShipRequirementsData extends DataResource
{
    public ?int $power;

    public ?int $crew;

    public ?int $slots;
}
