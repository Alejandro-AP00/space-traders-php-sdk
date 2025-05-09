<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Modules;

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipCargoData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipModificationTransactionData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipMountData;
use Illuminate\Support\Collection;
use Saloon\Http\Response;

class RemoveMountResponse extends Response
{
    public function mounts(): Collection
    {
        return collect($this->json('data'))->map(fn (array $mount) => new ShipMountData($mount, $this->getConnector()));
    }

    public function cargo(): ShipCargoData
    {
        return new ShipCargoData($this->json('data.cargo'), $this->getConnector());
    }

    public function transaction(): ShipModificationTransactionData
    {
        return new ShipModificationTransactionData($this->json('data.transaction'), $this->getConnector());
    }

    public function agent(): AgentData
    {
        return new AgentData($this->json('data.agent'), $this->getConnector());
    }
}
