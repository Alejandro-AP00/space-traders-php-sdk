<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

class ScannedShip extends Resource
{
    public string $symbol;

    public ShipRegistration $registration;

    public ShipNav $nav;

    public array $frame;

    public array $reactor;

    public array $engine;

    public array $mounts;
}
