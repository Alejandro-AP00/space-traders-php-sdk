<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Contracts;

use AlejandroAPorras\SpaceTraders\Responses\AcceptContractResponse;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * accept-contract
 *
 * Accept a contract by ID.
 *
 * You can only accept contracts that were offered to you, were not accepted
 * yet, and whose deadlines has not passed yet.
 */
class AcceptContract extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/contracts/{$this->contractId}/accept";
    }

    /**
     * @param  string  $contractId  The contract ID to accept.
     */
    public function __construct(
        protected string $contractId,
    ) {}

    public function resolveResponseClass(): ?string
    {
        return AcceptContractResponse::class;
    }
}
