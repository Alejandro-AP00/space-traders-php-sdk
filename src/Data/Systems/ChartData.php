<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ChartData extends DataResource
{
    public string $waypointSymbol;

    public string $submittedBy;

    public string $submittedOn;
}
