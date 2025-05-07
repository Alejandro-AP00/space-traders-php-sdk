<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Systems;

use AlejandroAPorras\SpaceTraders\Data\Systems\JumpGateData;
use Saloon\Http\Response;

class JumpGateResponse extends Response
{
    public function jumpGate(): JumpGateData
    {
        return new JumpGateData($this->json('data'), $this->getConnector());
    }
}
