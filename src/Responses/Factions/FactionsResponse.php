<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Factions;

use AlejandroAPorras\SpaceTraders\Data\Factions\FactionData;
use AlejandroAPorras\SpaceTraders\Data\MetaData;
use Saloon\Http\Response;

class FactionsResponse extends Response
{
    public function factions(): array
    {
        $data = $this->json('data');

        return array_map(
            fn (array $faction) => new FactionData($faction, $this->getConnector()),
            $data
        );
    }

    public function meta(): MetaData
    {
        return new MetaData($this->json('meta'), $this->getConnector());
    }
}
