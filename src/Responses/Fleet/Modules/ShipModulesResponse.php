<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Cargo;

use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ExtractionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipCargoData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipModuleData;
use Illuminate\Support\Collection;
use Saloon\Http\Response;

class ShipModulesResponse extends Response
{
    public function modules(): Collection
    {
        return collect($this->json('data'))->map(fn (array $module) => new ShipModuleData($module, $this->getConnector()));
    }
}
