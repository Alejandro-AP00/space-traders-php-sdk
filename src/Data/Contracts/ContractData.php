<?php

namespace AlejandroAPorras\SpaceTraders\Data\Contracts;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\ContractType;
use AlejandroAPorras\SpaceTraders\Enums\FactionSymbol;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;

class ContractData extends DataResource
{
    public string $id;

    public FactionSymbol $factionSymbol;

    public ContractType $type;

    public ContractTerms $terms;

    public bool $accepted;

    public bool $fulfilled;

    public string $deadlineToAccept;

    public function accept()
    {
        return $this->spaceTraders->contracts()->acceptContract($this->id);
    }

    public function deliver(string $shipSymbol, TradeGoodSymbol $tradeSymbol, int $units)
    {
        return $this->spaceTraders->contracts()->deliverContract(contractId: $this->id, shipSymbol: $shipSymbol, tradeSymbol: $tradeSymbol, units: $units);
    }

    public function fulfill()
    {
        return $this->spaceTraders->contracts()->fulfillContract($this->id);
    }
}
