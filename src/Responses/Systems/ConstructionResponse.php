<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Systems;

use AlejandroAPorras\SpaceTraders\Data\Systems\ConstructionData;
use Saloon\Http\Response;

class ConstructionResponse extends Response
{
    public function construction(): ConstructionData
    {
        return new ConstructionData($this->json('data'), $this->getConnector());
    }
}
