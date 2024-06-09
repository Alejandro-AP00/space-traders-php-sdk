<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\SpaceTraders;

class Ship extends Resource
{
    public string $symbol;

    public ShipRegistration $registration;

    public ShipNav $nav;

    public ShipCrew $crew;

    public ShipFrame $frame;

    public ShipReactor $reactor;

    public ShipEngine $engine;

    public Cooldown $cooldown;

    /**
     * @var ShipModule[]
     */
    public array $modules;

    /**
     * @var ShipMount[]
     */
    public array $mounts;

    public ShipCargo $cargo;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->modules = $this->transformCollection($this->modules ?: [], ShipModule::class);
        $this->mounts = $this->transformCollection($this->mounts ?: [], ShipMount::class);
    }
}
