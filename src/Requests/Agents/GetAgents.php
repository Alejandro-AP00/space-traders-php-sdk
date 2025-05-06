<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Agents;

use AlejandroAPorras\SpaceTraders\Responses\AgentsResponse;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

/**
 * get-agents
 *
 * Fetch agents details.
 */
class GetAgents extends Request implements Paginatable
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/agents';
    }

    /**
     * @param  null|int  $page  What entry offset to request
     * @param  null|int  $limit  How many entries to return per page
     */
    public function __construct() {}

    public function resolveResponseClass(): string
    {
        return AgentsResponse::class;
    }
}
