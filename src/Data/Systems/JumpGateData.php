<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class JumpGateData extends DataResource
{
    public string $symbol;

    public array $connections;
}
