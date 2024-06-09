<?php

namespace AlejandroAPorras\SpaceTraders\Actions;

use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\Resources\Agent;
use AlejandroAPorras\SpaceTraders\Resources\Contract;
use AlejandroAPorras\SpaceTraders\Resources\ShipCargo;
use AlejandroAPorras\SpaceTraders\Support\PaginatedResults;

trait ManagesContracts
{
    /**
     * @return PaginatedResults<Contract>
     */
    public function contracts(array $filters = []): PaginatedResults
    {
        return PaginatedResults::make(
            'my/contracts',
            Contract::class,
            $this,
            $filters
        );
    }

    public function contract(string $contractId): Contract
    {
        ['data' => $data] = $this->get("my/contracts/{$contractId}");

        return new Contract($data, $this);
    }

    /**
     * @return array{agent: Agent, contract: Contract}
     */
    public function acceptContract(string $contractId): array
    {
        ['data' => $data] = $this->post("my/contracts/{$contractId}/accept");

        return [
            'agent' => new Agent($data['agent'], $this),
            'contract' => new Contract($data['contract'], $this),
        ];
    }

    /**
     * @return array{cargo: ShipCargo, contract: Contract}
     */
    public function deliverContract(string $contractId, string $shipSymbol, TradeGoodSymbol $tradeSymbol, int $units): array
    {
        ['data' => $data] = $this->post("my/contracts/{$contractId}/deliver", [
            'shipSymbol' => $shipSymbol,
            'tradeSymbol' => $tradeSymbol->value,
            'units' => $units,
        ]);

        return [
            'contract' => new Contract($data['contract'], $this),
            'cargo' => new ShipCargo($data['cargo'], $this),
        ];
    }

    /**
     * @return array{agent: Agent, contract: Contract}
     */
    public function fulfillContract(string $contractId): array
    {
        ['data' => $data] = $this->post("my/contracts/{$contractId}/fulfill");

        return [
            'agent' => new Agent($data['agent'], $this),
            'contract' => new Contract($data['contract'], $this),
        ];
    }
}
