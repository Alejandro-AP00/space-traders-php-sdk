<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Resource;

use AlejandroAPorras\SpaceTraders\Sdk\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Contracts\AcceptContract;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Contracts\DeliverContract;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Contracts\FulfillContract;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Contracts\GetContract;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Contracts\GetContracts;
use AlejandroAPorras\SpaceTraders\Sdk\Resource;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\PagedPaginator;

class Contracts extends Resource
{
    /**
     * @param  int  $page  What entry offset to request
     * @param  int  $limit  How many entries to return per page
     */
    public function getContracts(?int $page, ?int $limit): PagedPaginator
    {
        return $this->connector->paginate(new GetContracts($page, $limit));
    }

    /**
     * @param  string  $contractId  The contract ID
     */
    public function getContract(string $contractId): Response
    {
        return $this->connector->send(new GetContract($contractId));
    }

    /**
     * @param  string  $contractId  The contract ID to accept.
     */
    public function acceptContract(string $contractId): Response
    {
        return $this->connector->send(new AcceptContract($contractId));
    }

    /**
     * @param  string  $contractId  The ID of the contract.
     */
    public function deliverContract(string $contractId, string $shipSymbol, TradeGoodSymbol $tradeSymbol, int $units): Response
    {
        return $this->connector->send(new DeliverContract($contractId, $shipSymbol, $tradeSymbol, $units));
    }

    /**
     * @param  string  $contractId  The ID of the contract to fulfill.
     */
    public function fulfillContract(string $contractId): Response
    {
        return $this->connector->send(new FulfillContract($contractId));
    }
}
