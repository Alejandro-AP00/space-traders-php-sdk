<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Contracts;

use AlejandroAPorras\SpaceTraders\Data\Contracts\ContractData;
use AlejandroAPorras\SpaceTraders\Traits\HasMetaData;
use Illuminate\Support\Collection;
use Saloon\Http\Response;

class ContractsResponse extends Response
{
    use HasMetaData;

    /**
     * @return Collection<int, ContractData>
     */
    public function contracts(): Collection
    {
        return collect($this->json('data'))->map(fn (array $contract) => new ContractData($contract, $this->getConnector())
        );
    }
}
