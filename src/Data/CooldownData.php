<?php

namespace AlejandroAPorras\SpaceTraders\Data;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class CooldownData extends DataResource
{
    public string $shipSymbol;

    public int $totalSeconds;

    public int $remainingSeconds;

    public ?string $expiration = null;
}
