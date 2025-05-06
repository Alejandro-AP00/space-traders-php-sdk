<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Sdk\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Sdk\Enums\ContractType;
use AlejandroAPorras\SpaceTraders\Sdk\Enums\FactionSymbol;
use AlejandroAPorras\SpaceTraders\Sdk\Enums\TradeGoodSymbol;

class Contract extends DataResource
{
    public string $id;

    public FactionSymbol $factionSymbol;

    public ContractType $type;

    public ContractTerms $terms;

    public bool $accepted;

    public bool $fulfilled;

    public string $deadlineToAccept;

    /**
     * @return array{agent: Agent, contract: Contract}
     */
    public function accept(): array
    {
        return $this->spaceTraders->acceptContract($this->id);
    }

    /**
     * @return array{cargo: ShipCargo, contract: Contract}
     */
    public function deliver(string $shipSymbol, TradeGoodSymbol $tradeSymbol, int $units): array
    {
        return $this->spaceTraders->deliverContract(contractId: $this->id, shipSymbol: $shipSymbol, tradeSymbol: $tradeSymbol, units: $units);
    }

    /**
     * @return array{agent: Agent, contract: Contract}
     */
    public function fulfill(): array
    {
        return $this->spaceTraders->fulfillContract($this->id);
    }
}