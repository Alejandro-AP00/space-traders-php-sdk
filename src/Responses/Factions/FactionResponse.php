<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Factions;

use AlejandroAPorras\SpaceTraders\Data\Factions\FactionData;
use Saloon\Http\Response;

class FactionResponse extends Response
{
    public function faction(): FactionData
    {
        return new FactionData($this->json('data'), $this->getConnector());
    }
}
