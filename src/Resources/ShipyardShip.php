<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\ShipType;
use AlejandroAPorras\SpaceTraders\Enums\SupplyLevel;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class ShipyardShip extends Resource
{
    public ShipType $type;

    public string $name;

    public string $description;

    public SupplyLevel $supply;

    public int $purchasePrice;

    public ShipFrame $frame;

    public ShipReactor $reactor;

    public ShipEngine $engine;

    /**
     * @var ShipModule[]
     */
    public array $modules;

    /**
     * @var ShipMount[]
     */
    public array $mounts;

    public ShipCrew $crew;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->modules = $this->transformCollection($this->modules ?: [], ShipModule::class);
        $this->mounts = $this->transformCollection($this->mounts ?: [], ShipMount::class);
    }
}
