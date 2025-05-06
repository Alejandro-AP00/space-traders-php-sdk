<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Contracts;

use AlejandroAPorras\SpaceTraders\Data\Contracts\ContractData;
use Saloon\Http\Response;

class ContractResponse extends Response
{
    public function contract(): ContractData
    {
        return new ContractData($this->json('data'), $this->getConnector());
    }
}