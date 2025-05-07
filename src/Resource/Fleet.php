<?php

namespace AlejandroAPorras\SpaceTraders\Resource;

use AlejandroAPorras\SpaceTraders\Enums\DepositSize;
use AlejandroAPorras\SpaceTraders\Enums\ProduceType;
use AlejandroAPorras\SpaceTraders\Enums\ShipNavFlightMode;
use AlejandroAPorras\SpaceTraders\Enums\ShipType;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\GetMyShip;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\GetMyShips;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\GetScrapShip;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\NegotiateContract;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\PurchaseShip;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\ScrapShip;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Cargo\ExtractResources;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Cargo\ExtractResourcesWithSurvey;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Cargo\GetMyShipCargo;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Cargo\Jettison;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Cargo\PurchaseCargo;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Cargo\SellCargo;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Cargo\ShipRefine;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Cargo\SiphonResources;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Cargo\TransferCargo;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Maintenance\GetRepairShip;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Maintenance\GetShipCooldown;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Maintenance\RefuelShip;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Maintenance\RepairShip;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Mounts\GetMounts;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Modules\GetShipModules;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Mounts\InstallMount;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Modules\InstallShipModule;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Mounts\RemoveMount;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Modules\RemoveShipModule;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Navigation\DockShip;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Navigation\GetShipNav;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Navigation\JumpShip;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Navigation\NavigateShip;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Navigation\OrbitShip;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Navigation\PatchShipNav;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Navigation\WarpShip;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Scanning\CreateChart;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Scanning\CreateShipShipScan;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Scanning\CreateShipSystemScan;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Scanning\CreateShipWaypointScan;
use AlejandroAPorras\SpaceTraders\Requests\Fleet\Scanning\CreateSurvey;
use AlejandroAPorras\SpaceTraders\Resource;
use AlejandroAPorras\SpaceTraders\Responses;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\PagedPaginator;
use AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation\DockShipResponse;
use AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation\OrbitShipResponse;
use AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation\JumpShipResponse;
use AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation\NavigateShipResponse;
use AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation\ShipNavResponse;
use AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation\PatchShipNavResponse;
use AlejandroAPorras\SpaceTraders\Responses\Fleet\Navigation\WarpShipResponse;

class Fleet extends Resource
{
    /**
     * @param  int  $page  What entry offset to request
     * @param  int  $limit  How many entries to return per page
     */
    public function getMyShips(): PagedPaginator
    {
        return $this->connector->paginate(new GetMyShips);
    }

    public function purchaseShip(ShipType $shipType, string $waypointSymbol): Response
    {
        return $this->connector->send(new PurchaseShip($shipType, $waypointSymbol));
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship.
     */
    public function getMyShip(string $shipSymbol): Response
    {
        return $this->connector->send(new GetMyShip($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship.
     */
    public function getMyShipCargo(string $shipSymbol): Response
    {
        return $this->connector->send(new GetMyShipCargo($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship.
     */
    public function orbitShip(string $shipSymbol): OrbitShipResponse
    {
        return $this->connector->send(new OrbitShip($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship.
     */
    public function shipRefine(string $shipSymbol, ProduceType $produce): Response
    {
        return $this->connector->send(new ShipRefine($shipSymbol, $produce));
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship.
     */
    public function createChart(string $shipSymbol): Response
    {
        return $this->connector->send(new CreateChart($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship.
     */
    public function getShipCooldown(string $shipSymbol): Response
    {
        return $this->connector->send(new GetShipCooldown($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship.
     */
    public function dockShip(string $shipSymbol): DockShipResponse
    {
        return $this->connector->send(new DockShip($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship.
     */
    public function createSurvey(string $shipSymbol): Response
    {
        return $this->connector->send(new CreateSurvey($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function extractResources(string $shipSymbol): Response
    {
        return $this->connector->send(new ExtractResources($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function siphonResources(string $shipSymbol): Response
    {
        return $this->connector->send(new SiphonResources($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function extractResourcesWithSurvey(string $shipSymbol, string $signature, string $waypointSymbol, array $deposits, string $expiration, DepositSize $size): Response
    {
        return $this->connector->send(new ExtractResourcesWithSurvey($shipSymbol, $signature, $waypointSymbol, $deposits, $expiration, $size));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function jettison(string $shipSymbol, TradeGoodSymbol $tradeGood, int $units): Response
    {
        return $this->connector->send(new Jettison($shipSymbol, $tradeGood, $units));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function jumpShip(string $shipSymbol, string $waypointSymbol): JumpShipResponse
    {
        return $this->connector->send(new JumpShip($shipSymbol, $waypointSymbol));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function navigateShip(string $shipSymbol, string $waypointSymbol): NavigateShipResponse
    {
        return $this->connector->send(new NavigateShip($shipSymbol, $waypointSymbol));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function getShipNav(string $shipSymbol): ShipNavResponse
    {
        return $this->connector->send(new GetShipNav($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function patchShipNav(string $shipSymbol, ShipNavFlightMode $flightMode): PatchShipNavResponse
    {
        return $this->connector->send(new PatchShipNav($shipSymbol, $flightMode));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function warpShip(string $shipSymbol, string $waypointSymbol): WarpShipResponse
    {
        return $this->connector->send(new WarpShip($shipSymbol, $waypointSymbol));
    }

    /**
     * @param  string  $shipSymbol  Symbol of a ship.
     */
    public function sellCargo(string $shipSymbol, TradeGoodSymbol $tradeGood, int $units): Response
    {
        return $this->connector->send(new SellCargo($shipSymbol, $tradeGood, $units));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function createShipSystemScan(string $shipSymbol): Response
    {
        return $this->connector->send(new CreateShipSystemScan($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function createShipWaypointScan(string $shipSymbol): Response
    {
        return $this->connector->send(new CreateShipWaypointScan($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function createShipShipScan(string $shipSymbol): Response
    {
        return $this->connector->send(new CreateShipShipScan($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function refuelShip(string $shipSymbol, int $units = 1, bool $fromCargo = false): Response
    {
        return $this->connector->send(new RefuelShip($shipSymbol, $units, $fromCargo));
    }

    /**
     * @param  string  $shipSymbol  The ship's symbol.
     */
    public function purchaseCargo(string $shipSymbol, TradeGoodSymbol $tradeGood, int $units): Response
    {
        return $this->connector->send(new PurchaseCargo($shipSymbol, $tradeGood, $units));
    }

    /**
     * @param  string  $shipSymbol  The transferring ship's symbol.
     */
    public function transferCargo(string $shipSymbol, TradeGoodSymbol $tradeGoodSymbol, int $units, string $transferToShipSymbol): Response
    {
        return $this->connector->send(new TransferCargo($shipSymbol, $tradeGoodSymbol, $units, $transferToShipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The ship's symbol.
     */
    public function negotiateContract(string $shipSymbol): Response
    {
        return $this->connector->send(new NegotiateContract($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The ship's symbol.
     */
    public function getMounts(string $shipSymbol): Response
    {
        return $this->connector->send(new GetMounts($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The ship's symbol.
     */
    public function installMount(string $shipSymbol, string $symbol): Response
    {
        return $this->connector->send(new InstallMount($shipSymbol, $symbol));
    }

    /**
     * @param  string  $shipSymbol  The ship's symbol.
     */
    public function removeMount(string $shipSymbol, string $symbol): Response
    {
        return $this->connector->send(new RemoveMount($shipSymbol, $symbol));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function getScrapShip(string $shipSymbol): Response
    {
        return $this->connector->send(new GetScrapShip($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function scrapShip(string $shipSymbol): Response
    {
        return $this->connector->send(new ScrapShip($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function getRepairShip(string $shipSymbol): Response
    {
        return $this->connector->send(new GetRepairShip($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function repairShip(string $shipSymbol): Response
    {
        return $this->connector->send(new RepairShip($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship
     */
    public function getShipModules(string $shipSymbol): Response
    {
        return $this->connector->send(new GetShipModules($shipSymbol));
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship
     */
    public function installShipModule(string $shipSymbol, string $symbol): Response
    {
        return $this->connector->send(new InstallShipModule($shipSymbol, $symbol));
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship
     */
    public function removeShipModule(string $shipSymbol, string $symbol): Response
    {
        return $this->connector->send(new RemoveShipModule($shipSymbol, $symbol));
    }
}
