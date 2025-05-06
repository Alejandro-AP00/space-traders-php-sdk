<?php

namespace AlejandroAPorras\SpaceTraders\Resource;

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Data\Contracts\ContractData;
use AlejandroAPorras\SpaceTraders\Data\Ships\ShipCargoData;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\Requests\Contracts\AcceptContract;
use AlejandroAPorras\SpaceTraders\Requests\Contracts\DeliverContract;
use AlejandroAPorras\SpaceTraders\Requests\Contracts\FulfillContract;
use AlejandroAPorras\SpaceTraders\Requests\Contracts\GetContract;
use AlejandroAPorras\SpaceTraders\Requests\Contracts\GetContracts;
use AlejandroAPorras\SpaceTraders\Resource;
use AlejandroAPorras\SpaceTraders\Responses\Contracts\ContractResponse;
use AlejandroAPorras\SpaceTraders\Responses\Contracts\AcceptContractResponse;
use AlejandroAPorras\SpaceTraders\Responses\Contracts\DeliverContractResponse;
use AlejandroAPorras\SpaceTraders\Responses\Contracts\FulfillContractResponse;
use Saloon\PaginationPlugin\PagedPaginator;

class Contracts extends Resource
{
    /**
     * @return PagedPaginator
     */
    public function getContracts(): PagedPaginator
    {
        return $this->connector->paginate(new GetContracts());
    }

    /**
     * @param  string  $contractId  The contract ID
     * @return ContractData
     */
    public function getContract(string $contractId): ContractResponse
    {
        return $this->connector->send(new GetContract($contractId));
    }

    /**
     * @param  string  $contractId  The contract ID to accept.
     * @return array{agent: AgentData, contract: ContractData}
     */
    public function acceptContract(string $contractId): AcceptContractResponse
    {
        return $this->connector->send(new AcceptContract($contractId));
    }

    /**
     * @param  string  $contractId  The ID of the contract.
     */
    public function deliverContract(string $contractId, string $shipSymbol, TradeGoodSymbol $tradeSymbol, int $units): DeliverContractResponse
    {
        return $this->connector->send(new DeliverContract($contractId, $shipSymbol, $tradeSymbol, $units));
    }

    /**
     * @param  string  $contractId  The ID of the contract to fulfill.
     */
    public function fulfillContract(string $contractId): FulfillContractResponse
    {
        return $this->connector->send(new FulfillContract($contractId));
    }
}
