<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Globals;

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Data\Contracts\ContractData;
use AlejandroAPorras\SpaceTraders\Data\Factions\FactionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipData;
use Illuminate\Support\Collection;
use Saloon\Http\Response;

class RegisterAgentResponse extends Response
{
    public function agent(): AgentData
    {
        return new AgentData($this->json('data.agent'), $this->getConnector());
    }

    public function ships(): Collection
    {
        return collect($this->json('data.ships'))->map(fn (array $ship) => new ShipData($ship, $this->getConnector()));
    }

    public function faction(): FactionData
    {
        return new FactionData($this->json('data.faction'), $this->getConnector());
    }

    public function contract(): ContractData
    {
        return new ContractData($this->json('data.contract'), $this->getConnector());
    }

    public function token(): string
    {
        return $this->json('data.token');
    }
}
