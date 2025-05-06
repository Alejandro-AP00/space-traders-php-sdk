<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Contracts;

use AlejandroAPorras\SpaceTraders\Data\Contracts\ContractData;
use AlejandroAPorras\SpaceTraders\Data\Ships\ShipCargoData;
use Saloon\Http\Response;

class DeliverContractResponse extends Response
{
    public function contract(): ContractData
    {
        return new ContractData($this->json('data.contract'), $this->getConnector());
    }

    public function cargo(): ShipCargoData
    {
        return new ShipCargoData($this->json('data.cargo'), $this->getConnector());
    }
}
