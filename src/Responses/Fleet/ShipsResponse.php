<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Systems;

use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipData;
use AlejandroAPorras\SpaceTraders\Data\Systems\SystemData;
use AlejandroAPorras\SpaceTraders\Traits\HasMetaData;
use Illuminate\Support\Collection;
use Saloon\Http\Response;

class ShipsResponse extends Response
{
    use HasMetaData;

    public function ships(): Collection
    {
        return collect($this->json('data'))->map(fn (array $system) => new ShipData($system, $this->getConnector()));
    }
}
