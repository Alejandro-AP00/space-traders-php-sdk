<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Agents;

use AlejandroAPorras\SpaceTraders\Sdk\Responses\AgentResponse;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-agent
 *
 * Fetch agent details.
 */
class GetAgent extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/agents/{$this->agentSymbol}";
    }

    /**
     * @param  string  $agentSymbol  The agent symbol
     */
    public function __construct(
        protected string $agentSymbol,
    ) {}

    public function resolveResponseClass(): ?string
    {
        return AgentResponse::class;
    }
}
