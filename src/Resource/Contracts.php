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
use AlejandroAPorras\SpaceTraders\Responses\AcceptContractResponse;
use AlejandroAPorras\SpaceTraders\Responses\DeliverContractResponse;
use AlejandroAPorras\SpaceTraders\Responses\FulfillContractResponse;
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
    public function getContract(string $contractId): ContractData
    {
        return $this->connector->send(new GetContract($contractId))->contract();
    }

    /**
     * @param  string  $contractId  The contract ID to accept.
     * @return array{agent: AgentData, contract: ContractData}
     */
    public function acceptContract(string $contractId): array
    {
        $response = $this->connector->send(new AcceptContract($contractId));
        return [
            'agent' => $response->agent(),
            'contract' => $response->contract(),
        ];
    }

    /**
     * @param  string  $contractId  The ID of the contract.
     * @return array{cargo: ShipCargoData, contract: ContractData}
     */
    public function deliverContract(string $contractId, string $shipSymbol, TradeGoodSymbol $tradeSymbol, int $units): array
    {
        $response = $this->connector->send(new DeliverContract($contractId, $shipSymbol, $tradeSymbol, $units));
        return [
            'cargo' => $response->cargo(),
            'contract' => $response->contract(),
        ];
    }

    /**
     * @param  string  $contractId  The ID of the contract to fulfill.
     * @return array{agent: AgentData, contract: ContractData}
     */
    public function fulfillContract(string $contractId): array
    {
        $response = $this->connector->send(new FulfillContract($contractId));
        return [
            'agent' => $response->agent(),
            'contract' => $response->contract(),
        ];
    }
}
