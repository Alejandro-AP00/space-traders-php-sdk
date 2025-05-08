<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Factions;

use AlejandroAPorras\SpaceTraders\Data\Factions\FactionData;
use AlejandroAPorras\SpaceTraders\Data\MetaData;
use AlejandroAPorras\SpaceTraders\Traits\HasMetaData;
use Illuminate\Support\Collection;
use Saloon\Http\Response;

class FactionsResponse extends Response
{
    use HasMetaData;

    /**
     * @return Collection<int, FactionData>
     */
    public function factions(): Collection
    {
        return collect($this->json('data'))->map(fn (array $faction) => new FactionData($faction, $this->getConnector()));
    }
}
