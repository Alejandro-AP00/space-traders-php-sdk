<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

class Cooldown extends Resource
{
    public string $shipSymbol;

    public int $totalSeconds;

    public int $remainingSeconds;

    public ?string $expiration = null;
}
