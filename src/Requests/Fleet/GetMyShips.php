<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet;

use AlejandroAPorras\SpaceTraders\Responses\Systems\ShipsResponse;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

/**
 * get-my-ships
 *
 * Return a paginated list of all of ships under your agent's ownership.
 */
class GetMyShips extends Request implements Paginatable
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/my/ships';
    }

    /**
     * @param  null|int  $page  What entry offset to request
     * @param  null|int  $limit  How many entries to return per page
     */
    public function __construct() {}

    public function resolveResponseClass(): string
    {
        return ShipsResponse::class;
    }
}
