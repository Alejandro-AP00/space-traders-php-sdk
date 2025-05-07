<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Scanning;

use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ScannedSystem;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ScannedSystemData;
use Saloon\Http\Response;

class ShipSystemScanResponse extends Response
{
    public function cooldown(): CooldownData
    {
        return new CooldownData($this->json('data.cooldown'), $this->getConnector());
    }

    /**
     * Get the scanned systems
     *
     * @return array<ScannedSystem>
     */
    public function systems(): array
    {
        $data = $this->json('data.systems');

        return array_map(
            fn (array $system) => new ScannedSystemData($system, $this->getConnector()),
            $data
        );
    }
}
