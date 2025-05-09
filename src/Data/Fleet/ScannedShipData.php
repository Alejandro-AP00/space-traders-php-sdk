<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ScannedShipData extends DataResource
{
    public string $symbol;

    public ShipRegistrationData $registration;

    public ShipNavData $nav;

    public ?ShipFrameData $frame = null;

    public ?ShipReactorData $reactor = null;

    public ShipEngineData $engine;

    public array $mounts = [];
}
