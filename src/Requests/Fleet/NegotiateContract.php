<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet;

use AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance\NegotiateContractResponse;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * negotiateContract
 *
 * Negotiate a new contract with the HQ.
 *
 * In order to negotiate a new contract, an agent must not have
 * ongoing or offered contracts over the allowed maximum amount. Currently the maximum contracts an
 * agent can have at a time is 1.
 *
 * Once a contract is negotiated, it is added to the list of contracts
 * offered to the agent, which the agent can then accept.
 *
 * The ship must be present at any waypoint
 * with a faction present to negotiate a contract with that faction.
 */
class NegotiateContract extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/negotiate/contract";
    }

    /**
     * @param  string  $shipSymbol  The ship's symbol.
     */
    public function __construct(
        protected string $shipSymbol,
    ) {}

    public function resolveResponseClass(): string
    {
        return NegotiateContractResponse::class;
    }
}
