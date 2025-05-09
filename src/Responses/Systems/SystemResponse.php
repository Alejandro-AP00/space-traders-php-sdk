<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Systems;

use AlejandroAPorras\SpaceTraders\Data\Systems\SystemData;
use Saloon\Http\Response;

class SystemResponse extends Response
{
    public function system(): SystemData
    {
        return new SystemData($this->json('data'), $this->getConnector());
    }
}
