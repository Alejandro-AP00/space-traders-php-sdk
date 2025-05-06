<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Contracts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * fulfill-contract
 *
 * Fulfill a contract. Can only be used on contracts that have all of their delivery terms fulfilled.
 */
class FulfillContract extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/contracts/{$this->contractId}/fulfill";
    }

    /**
     * @param  string  $contractId  The ID of the contract to fulfill.
     */
    public function __construct(
        protected string $contractId,
    ) {}
}
