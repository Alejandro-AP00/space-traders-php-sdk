<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Resource;

use Saloon\Http\Response;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Data\GetSupplyChain;
use AlejandroAPorras\SpaceTraders\Sdk\Resource;

class Data extends Resource
{
	public function getSupplyChain(): Response
	{
		return $this->connector->send(new GetSupplyChain());
	}
}
