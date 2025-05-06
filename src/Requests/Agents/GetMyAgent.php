<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Agents;

use AlejandroAPorras\SpaceTraders\Sdk\Responses\AgentResponse;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-my-agent
 *
 * Fetch your agent's details.
 */
class GetMyAgent extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/my/agent';
    }

    public function __construct() {}

    public function resolveResponseClass(): string
    {
        return AgentResponse::class;
    }
}
