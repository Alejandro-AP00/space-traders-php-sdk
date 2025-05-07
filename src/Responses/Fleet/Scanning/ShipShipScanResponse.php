<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Scanning;

use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ScannedShip;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ScannedShipData;
use Saloon\Http\Response;

class ShipShipScanResponse extends Response
{
    public function cooldown(): CooldownData
    {
        return new CooldownData($this->json('data.cooldown'), $this->getConnector());
    }

    /**
     * Get the scanned ships
     *
     * @return array<ScannedShip>
     */
    public function ships(): array
    {
        $data = $this->json('data.ships');

        return array_map(
            fn (array $ship) => new ScannedShipData($ship, $this->getConnector()),
            $data
        );
    }
}
