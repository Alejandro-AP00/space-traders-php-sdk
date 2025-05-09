<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance;

use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use Saloon\Http\Response;

class ShipCooldownResponse extends Response
{
    public function cooldown(): ?CooldownData
    {
        if ($this->status() === 204) {
            return null;
        }

        return new CooldownData($this->json('data'), $this->getConnector());
    }
}
