<?php

namespace AlejandroAPorras\SpaceTraders\Resource;

use AlejandroAPorras\SpaceTraders\Requests\Data\GetSupplyChain;
use AlejandroAPorras\SpaceTraders\Resource;
use Saloon\Http\Response;

class Data extends Resource
{
    public function getSupplyChain(): Response
    {
        return $this->connector->send(new GetSupplyChain);
    }
}
