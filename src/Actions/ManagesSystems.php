<?php

namespace AlejandroAPorras\SpaceTraders\Actions;

use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\Resources\Construction;
use AlejandroAPorras\SpaceTraders\Resources\JumpGate;
use AlejandroAPorras\SpaceTraders\Resources\Market;
use AlejandroAPorras\SpaceTraders\Resources\ShipCargo;
use AlejandroAPorras\SpaceTraders\Resources\Shipyard;
use AlejandroAPorras\SpaceTraders\Resources\System;
use AlejandroAPorras\SpaceTraders\Resources\Waypoint;
use AlejandroAPorras\SpaceTraders\Support\PaginatedResults;

trait ManagesSystems
{
    /**
     * @return PaginatedResults<System>
     */
    public function systems(array $filter = []): PaginatedResults
    {
        return PaginatedResults::make('systems', System::class, $this, $filter);
    }

    public function system(string $systemSymbol): System
    {
        ['data' => $data] = $this->get("systems/{$systemSymbol}");

        return new System($data, $this);
    }

    /**
     * @return PaginatedResults<Waypoint>
     */
    public function waypoints(string $systemSymbol, $filters = []): PaginatedResults
    {
        return PaginatedResults::make("systems/{$systemSymbol}/waypoints", Waypoint::class, $this, $filters);
    }

    public function waypoint(string $systemSymbol, string $waypointSymbol): Waypoint
    {
        ['data' => $data] = $this->get("systems/{$systemSymbol}/waypoints/{$waypointSymbol}");

        return new Waypoint($data, $this);
    }

    public function market(string $systemSymbol, string $waypointSymbol): Market
    {
        ['data' => $data] = $this->get("systems/{$systemSymbol}/waypoints/{$waypointSymbol}/market");

        return new Market($data, $this);
    }

    public function shipyard(string $systemSymbol, string $waypointSymbol): Shipyard
    {
        ['data' => $data] = $this->get("systems/{$systemSymbol}/waypoints/{$waypointSymbol}/shipyard");

        return new Shipyard($data, $this);
    }

    public function jumpGate(string $systemSymbol, string $waypointSymbol): JumpGate
    {
        ['data' => $data] = $this->get("systems/{$systemSymbol}/waypoints/{$waypointSymbol}/jump-gate");

        return new JumpGate($data, $this);
    }

    public function construction(string $systemSymbol, string $waypointSymbol): Construction
    {
        ['data' => $data] = $this->get("systems/{$systemSymbol}/waypoints/{$waypointSymbol}/construction");

        return new Construction($data, $this);
    }

    /**
     * @return array{construction: Construction, cargo: ShipCargo}
     */
    public function supplyConstruction(string $systemSymbol, string $waypointSymbol, string $shipSymbol, TradeGoodSymbol $tradeSymbol, int $units): array
    {
        ['data' => $data] = $this->post("systems/{$systemSymbol}/waypoints/{$waypointSymbol}/construction/supply", [
            'shipSymbol' => $shipSymbol,
            'tradeSymbol' => $tradeSymbol,
            'units' => $units,
        ]);

        return [
            'construction' => new Construction($data['construction'], $this),
            'cargo' => new ShipCargo($data['cargo'], $this),
        ];
    }
}
