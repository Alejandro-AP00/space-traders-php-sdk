<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Cargo;

use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ExtractionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipCargoData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipModuleData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipMountData;
use Illuminate\Support\Collection;
use Saloon\Http\Response;

class MountsResponse extends Response
{
    public function mounts(): Collection
    {
        return collect($this->json('data'))->map(fn (array $mount) => new ShipMountData($mount, $this->getConnector()));
    }
}
