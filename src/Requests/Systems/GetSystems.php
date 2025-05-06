<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Systems;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

/**
 * get-systems
 *
 * Return a paginated list of all systems.
 */
class GetSystems extends Request implements Paginatable
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/systems';
    }

    /**
     * @param  null|int  $page  What entry offset to request
     * @param  null|int  $limit  How many entries to return per page
     */
    public function __construct(
        protected ?int $page = null,
        protected ?int $limit = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page, 'limit' => $this->limit]);
    }
}
