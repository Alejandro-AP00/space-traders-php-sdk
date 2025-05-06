<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Resource;

use AlejandroAPorras\SpaceTraders\Sdk\Requests\Data\GetSupplyChain;
use AlejandroAPorras\SpaceTraders\Sdk\Resource;
use Saloon\Http\Response;

class Data extends Resource
{
    public function getSupplyChain(): Response
    {
        return $this->connector->send(new GetSupplyChain);
    }
}
