<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Data;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-supply-chain
 *
 * Describes which import and exports map to each other.
 */
class GetSupplyChain extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/market/supply-chain';
    }

    public function __construct() {}
}
