<?php

namespace AlejandroAPorras\SpaceTraders\Sdk;

use Saloon\Http\Connector;

class Resource
{
	public function __construct(
		protected Connector $connector,
	) {
	}
}
