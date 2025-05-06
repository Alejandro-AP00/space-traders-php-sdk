<?php

namespace AlejandroAPorras\SpaceTraders\Resource;

use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\Enums\WaypointType;
use AlejandroAPorras\SpaceTraders\Requests\Systems\GetConstruction;
use AlejandroAPorras\SpaceTraders\Requests\Systems\GetJumpGate;
use AlejandroAPorras\SpaceTraders\Requests\Systems\GetMarket;
use AlejandroAPorras\SpaceTraders\Requests\Systems\GetShipyard;
use AlejandroAPorras\SpaceTraders\Requests\Systems\GetSystem;
use AlejandroAPorras\SpaceTraders\Requests\Systems\GetSystems;
use AlejandroAPorras\SpaceTraders\Requests\Systems\GetSystemWaypoints;
use AlejandroAPorras\SpaceTraders\Requests\Systems\GetWaypoint;
use AlejandroAPorras\SpaceTraders\Requests\Systems\SupplyConstruction;
use AlejandroAPorras\SpaceTraders\Resource;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\PagedPaginator;
use Saloon\PaginationPlugin\Paginator;

class Systems extends Resource
{
    /**
     * Get all systems with pagination
     */
    public function getSystems(): PagedPaginator
    {
        return $this->connector->paginate(new GetSystems);
    }

    /**
     * @param  string  $systemSymbol  The system symbol
     */
    public function getSystem(string $systemSymbol): Response
    {
        return $this->connector->send(new GetSystem($systemSymbol));
    }

    /**
     * Get all waypoints in a system with pagination
     *
     * @param  string  $systemSymbol  The system symbol
     * @param  string|null  $type  Filter waypoints by type.
     * @param  mixed|WaypointTraitSymbol|WaypointTraitSymbol[]  $traits  Filter waypoints by one or more traits.
     */
    public function getSystemWaypoints(
        string $systemSymbol,
        ?WaypointType $type = null,
        mixed $traits = null,
    ): Paginator {
        return $this->connector->paginate(new GetSystemWaypoints($systemSymbol, $type, $traits));
    }

    /**
     * @param  string  $systemSymbol  The system symbol
     * @param  string  $waypointSymbol  The waypoint symbol
     */
    public function getWaypoint(string $systemSymbol, string $waypointSymbol): Response
    {
        return $this->connector->send(new GetWaypoint($systemSymbol, $waypointSymbol));
    }

    /**
     * @param  string  $systemSymbol  The system symbol
     * @param  string  $waypointSymbol  The waypoint symbol
     */
    public function getMarket(string $systemSymbol, string $waypointSymbol): Response
    {
        return $this->connector->send(new GetMarket($systemSymbol, $waypointSymbol));
    }

    /**
     * @param  string  $systemSymbol  The system symbol
     * @param  string  $waypointSymbol  The waypoint symbol
     */
    public function getShipyard(string $systemSymbol, string $waypointSymbol): Response
    {
        return $this->connector->send(new GetShipyard($systemSymbol, $waypointSymbol));
    }

    /**
     * @param  string  $systemSymbol  The system symbol
     * @param  string  $waypointSymbol  The waypoint symbol
     */
    public function getJumpGate(string $systemSymbol, string $waypointSymbol): Response
    {
        return $this->connector->send(new GetJumpGate($systemSymbol, $waypointSymbol));
    }

    /**
     * @param  string  $systemSymbol  The system symbol
     * @param  string  $waypointSymbol  The waypoint symbol
     */
    public function getConstruction(string $systemSymbol, string $waypointSymbol): Response
    {
        return $this->connector->send(new GetConstruction($systemSymbol, $waypointSymbol));
    }

    /**
     * @param  string  $systemSymbol  The system symbol
     * @param  string  $waypointSymbol  The waypoint symbol
     */
    public function supplyConstruction(string $systemSymbol, string $waypointSymbol, string $shipSymbol, TradeGoodSymbol $tradeSymbol, int $units): Response
    {
        return $this->connector->send(new SupplyConstruction($systemSymbol, $waypointSymbol, $shipSymbol, $tradeSymbol, $units));
    }
}
