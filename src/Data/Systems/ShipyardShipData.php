<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipCrewData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipEngineData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipFrameData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipModuleData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipMountData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipReactorData;
use AlejandroAPorras\SpaceTraders\Enums\ShipType;
use AlejandroAPorras\SpaceTraders\Enums\SupplyLevel;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class ShipyardShipData extends DataResource
{
    public ShipType $type;

    public string $name;

    public string $description;

    public SupplyLevel $supply;

    public int $purchasePrice;

    public ShipFrameData $frame;

    public ShipReactorData $reactor;

    public ShipEngineData $engine;

    /**
     * @var ShipModule[]
     */
    public array $modules;

    /**
     * @var ShipMount[]
     */
    public array $mounts;

    public ShipCrewData $crew;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->modules = $this->transformCollection($this->modules ?: [], ShipModuleData::class);
        $this->mounts = $this->transformCollection($this->mounts ?: [], ShipMountData::class);
    }
}
