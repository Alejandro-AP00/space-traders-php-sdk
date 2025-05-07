<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Factions;

use AlejandroAPorras\SpaceTraders\Responses\Factions\FactionsResponse;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

/**
 * get-factions
 *
 * Return a paginated list of all the factions in the game.
 */
class GetFactions extends Request implements Paginatable
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/factions';
    }

    /**
     * @param  null|int  $page  What entry offset to request
     * @param  null|int  $limit  How many entries to return per page
     */
    public function __construct() {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return FactionsResponse::class;
    }
}
