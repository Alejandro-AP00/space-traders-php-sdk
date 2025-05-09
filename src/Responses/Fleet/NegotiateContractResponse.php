<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance;

use AlejandroAPorras\SpaceTraders\Data\Contracts\ContractData;
use Saloon\Http\Response;

class NegotiateContractResponse extends Response
{
    public function contract(): ContractData
    {
        return new ContractData($this->json('data.contract'), $this->getConnector());
    }
}
