<?php

namespace AlejandroAPorras\SpaceTraders\Actions;

use AlejandroAPorras\SpaceTraders\Enums\ProduceType;
use AlejandroAPorras\SpaceTraders\Enums\ShipNavFlightMode;
use AlejandroAPorras\SpaceTraders\Enums\ShipType;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\Resources\Agent;
use AlejandroAPorras\SpaceTraders\Resources\Chart;
use AlejandroAPorras\SpaceTraders\Resources\Contract;
use AlejandroAPorras\SpaceTraders\Resources\Cooldown;
use AlejandroAPorras\SpaceTraders\Resources\Extraction;
use AlejandroAPorras\SpaceTraders\Resources\MarketTransaction;
use AlejandroAPorras\SpaceTraders\Resources\RepairTransaction;
use AlejandroAPorras\SpaceTraders\Resources\ScannedShip;
use AlejandroAPorras\SpaceTraders\Resources\ScannedSystem;
use AlejandroAPorras\SpaceTraders\Resources\ScannedWaypoint;
use AlejandroAPorras\SpaceTraders\Resources\ScrapTransaction;
use AlejandroAPorras\SpaceTraders\Resources\Ship;
use AlejandroAPorras\SpaceTraders\Resources\ShipCargo;
use AlejandroAPorras\SpaceTraders\Resources\ShipConditionEvent;
use AlejandroAPorras\SpaceTraders\Resources\ShipFuel;
use AlejandroAPorras\SpaceTraders\Resources\ShipModificationTransaction;
use AlejandroAPorras\SpaceTraders\Resources\ShipMount;
use AlejandroAPorras\SpaceTraders\Resources\ShipNav;
use AlejandroAPorras\SpaceTraders\Resources\ShipRefineGood;
use AlejandroAPorras\SpaceTraders\Resources\ShipyardTransaction;
use AlejandroAPorras\SpaceTraders\Resources\Siphon;
use AlejandroAPorras\SpaceTraders\Resources\Survey;
use AlejandroAPorras\SpaceTraders\Resources\Waypoint;
use AlejandroAPorras\SpaceTraders\Support\PaginatedResults;

trait ManagesFleet
{
    /**
     * @return PaginatedResults<Ship>
     */
    public function ships($filters = []): PaginatedResults
    {
        return PaginatedResults::make('my/ships', Ship::class, $this, $filters);
    }

    /**
     * @return array{agent: Agent, ship: Ship, }
     */
    public function purchaseShip(ShipType $shipType, string $waypointSymbol): array
    {
        ['data' => $data] = $this->post('my/ships', [
            'shipType' => $shipType,
            'waypointSymbol' => $waypointSymbol,
        ]);

        return [
            'agent' => new Agent($data['agent'], $this),
            'ship' => new Ship($data['ship'], $this),
            'transaction' => new ShipyardTransaction($data['transaction'], $this),
        ];
    }

    public function ship(string $shipSymbol): Ship
    {
        ['data' => $data] = $this->get("my/ships/{$shipSymbol}");

        return new Ship($data, $this);
    }

    public function shipCargo(string $shipSymbol): ShipCargo
    {
        ['data' => $data] = $this->get("my/ships/{$shipSymbol}/cargo");

        return new ShipCargo($data, $this);
    }

    /**
     * @return array{nav: ShipNav}
     */
    public function orbitShip(string $shipSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/orbit");

        return ['nav' => new ShipNav($data['nav'], $this)];
    }

    /**
     * @return array{cargo: ShipCargo, cooldown: Cooldown, produced: ShipRefineGood[], consumed: ShipRefineGood[]}
     */
    public function refineShip(string $shipSymbol, ProduceType $produce): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/refine", ['produce' => $produce->value]);

        return [
            'cargo' => new ShipCargo($data['cargo'], $this),
            'cooldown' => new Cooldown($data['cooldown'], $this),
            'produced' => $this->transformCollection($data['produced'], ShipRefineGood::class),
            'consumed' => $this->transformCollection($data['consumed'], ShipRefineGood::class),
        ];
    }

    /**
     * @return array{chart: Chart, waypoint: Waypoint}
     */
    public function chartShip(string $shipSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/chart");

        return [
            'chart' => new Chart($data['chart'], $this),
            'waypoint' => new Waypoint($data['waypoint'], $this),
        ];
    }

    public function shipCooldown(string $shipSymbol): Cooldown
    {
        ['data' => $data] = $this->get("my/ships/{$shipSymbol}/cooldown");

        return new Cooldown($data['cooldown'], $this);
    }

    /**
     * @return array{nav: ShipNav}
     */
    public function dockShip(string $shipSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/dock");

        return ['nav' => new ShipNav($data['nav'], $this)];
    }

    /**
     * @return array{chart: Cooldown, surveys: Survey[]}
     */
    public function createSurvey(string $shipSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/survey");

        return [
            'cooldown' => new Cooldown($data['cooldown'], $this),
            'surveys' => $this->transformCollection($data['surveys'], Survey::class),
        ];
    }

    /**
     * @return array{cooldown: Cooldown, extraction: Extraction, cargo: ShipCargo, events: ShipConditionEvent[]}
     */
    public function extractResources(string $shipSymbol, Survey $survey): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/extract", ['survey' => $survey->toArray()]);

        return [
            'cooldown' => new Cooldown($data['cooldown'], $this),
            'extraction' => new Extraction($data['extraction'], $this),
            'cargo' => new ShipCargo($data['cargo'], $this),
            'events' => $this->transformCollection($data['events'] ?: [], ShipConditionEvent::class),
        ];
    }

    /**
     * @return array{cooldown: Cooldown, siphon: Siphon, cargo: ShipCargo, events: ShipConditionEvent[]}
     */
    public function siphonResources(string $shipSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/siphon");

        return [
            'cooldown' => new Cooldown($data['cooldown'], $this),
            'siphon' => new Siphon($data['siphon'], $this),
            'cargo' => new ShipCargo($data['cargo'], $this),
            'events' => $this->transformCollection($data['events'] ?: [], ShipConditionEvent::class),
        ];
    }

    /**
     * @return array{cooldown: Cooldown, extraction: Extraction, cargo: ShipCargo, events: ShipConditionEvent[]}
     */
    public function extractResourcesWithSurvey(string $shipSymbol, Survey $survey): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/extract", [...$survey->toArray()]);

        return [
            'cooldown' => new Cooldown($data['cooldown'], $this),
            'extraction' => new Extraction($data['extraction'], $this),
            'cargo' => new ShipCargo($data['cargo'], $this),
            'events' => $this->transformCollection($data['events'] ?: [], ShipConditionEvent::class),
        ];
    }

    /**
     * @return array{cargo: ShipCargo}
     */
    public function jettisonCargo(string $shipSymbol, TradeGoodSymbol $symbol, int $units): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/siphon", [
            'symbol' => $symbol,
            'units' => $units,
        ]);

        return [
            'cargo' => new ShipCargo($data['cargo'], $this),
        ];
    }

    /**
     * @return array{nav: ShipNav, cooldown: Cooldown, transaction: MarketTransaction, agent: Agent}
     */
    public function jumpShip(string $shipSymbol, string $waypointSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/jump", [
            'waypointSymbol' => $waypointSymbol,
        ]);

        return [
            'nav' => new ShipNav($data['nav'], $this),
            'cooldown' => new Cooldown($data['cooldown'], $this),
            'transaction' => new MarketTransaction($data['transaction'], $this),
            'agent' => new Agent($data['agent'], $this),
        ];
    }

    /**
     * @return array{nav: ShipNav, fuel: ShipFuel, events: ShipConditionEvent[]}
     */
    public function navigateShip(string $shipSymbol, string $waypointSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/navigate", ['waypointSymbol' => $waypointSymbol]);

        return [
            'nav' => new ShipNav($data['nav'], $this),
            'fuel' => new ShipFuel($data['fuel'], $this),
            'events' => $this->transformCollection($data['events'] ?: [], ShipConditionEvent::class),
        ];
    }

    public function patchShipNav(string $shipSymbol, ShipNavFlightMode $flightMode): ShipNav
    {
        ['data' => $data] = $this->patch("my/ships/{$shipSymbol}/nav", ['flightMode' => $flightMode->value]);

        return new ShipNav($data, $this);
    }

    public function shipNav(string $shipSymbol): ShipNav
    {
        ['data' => $data] = $this->get("my/ships/{$shipSymbol}/nav");

        return new ShipNav($data, $this);
    }

    /**
     * @return array{nav: ShipNav, fuel: ShipFuel}
     */
    public function warpShip(string $shipSymbol, string $waypointSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/warp", ['waypointSymbol' => $waypointSymbol]);

        return [
            'nav' => new ShipNav($data['nav'], $this),
            'fuel' => new ShipFuel($data['fuel'], $this),
        ];
    }

    /**
     * @return array{cargo: ShipCargo, transaction: MarketTransaction, agent: Agent}
     */
    public function sellCargo(string $shipSymbol, TradeGoodSymbol $tradeGoodSymbol, int $units): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/sell", [
            'symbol' => $tradeGoodSymbol,
            'units' => $units,
        ]);

        return [
            'cargo' => new ShipCargo($data['cargo'], $this),
            'transaction' => new MarketTransaction($data['transaction'], $this),
            'agent' => new Agent($data['agent'], $this),
        ];
    }

    /**
     * @return array{systems: ScannedSystem[], cooldown: Cooldown}
     */
    public function scanSystems(string $shipSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/scan/systems");

        return [
            'cooldown' => new Cooldown($data['cooldown'], $this),
            'systems' => $this->transformCollection($data['systems'], ScannedSystem::class),
        ];
    }

    /**
     * @return array{systems: ScannedWaypoint[], cooldown: Cooldown}
     */
    public function scanWaypoints(string $shipSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/scan/waypoints");

        return [
            'cooldown' => new Cooldown($data['cooldown'], $this),
            'waypoints' => $this->transformCollection($data['waypoints'], ScannedWaypoint::class),
        ];
    }

    /**
     * @return array{ships: ScannedShip[], cooldown: Cooldown}
     */
    public function scanShips(string $shipSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/scan/waypoints");

        return [
            'cooldown' => new Cooldown($data['cooldown'], $this),
            'ships' => $this->transformCollection($data['ships'], ScannedShip::class),
        ];
    }

    /**
     * @return array{fuel: ShipFuel, transaction: MarketTransaction, agent: Agent}
     */
    public function refuelShip(string $shipSymbol, int $units, bool $fromCargo = false): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/refuel", [
            'fromCargo' => $fromCargo,
            'units' => $units,
        ]);

        return [
            'transaction' => new MarketTransaction($data['transaction'], $this),
            'fuel' => new ShipFuel($data['fuel'], $this),
            'agent' => new Agent($data['agent'], $this),
        ];
    }

    /**
     * @return array{cargo: ShipCargo, transaction: MarketTransaction, agent: Agent}
     */
    public function purchaseCargo(string $shipSymbol, TradeGoodSymbol $tradeGoodSymbol, int $units): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/purchase", [
            'symbol' => $tradeGoodSymbol,
            'units' => $units,
        ]);

        return [
            'cargo' => new ShipCargo($data['cargo'], $this),
            'transaction' => new MarketTransaction($data['transaction'], $this),
            'agent' => new Agent($data['agent'], $this),
        ];
    }

    /**
     * @return array{cargo: ShipCargo}
     */
    public function transferCargo(string $shipSymbol, TradeGoodSymbol $tradeGoodSymbol, int $units, string $transferShipSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/transfer", [
            'symbol' => $tradeGoodSymbol,
            'units' => $units,
            'shipSymbol' => $transferShipSymbol,
        ]);

        return [
            'cargo' => new ShipCargo($data['cargo'], $this),
        ];
    }

    /**
     * @return array{contract: Contract}
     */
    public function negotiateContract(string $shipSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/negotiate/contract");

        return [
            'contract' => new Contract($data['cooldown'], $this),
        ];
    }

    /**
     * @return ShipMount[]
     */
    public function shipMounts(string $shipSymbol): array
    {
        ['data' => $data] = $this->get("my/ships/{$shipSymbol}/mounts");

        return $this->transformCollection($data, ShipMount::class);
    }

    /**
     * @return array{agent: Agent, mounts: ShipMount[], cargo: ShipCargo, transaction: ShipModificationTransaction}
     */
    public function installShipMount(string $shipSymbol, string $mountSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/mounts/install", ['symbol' => $mountSymbol]);

        return [
            'agent' => new Agent($data['agent'], $this),
            'mounts' => $this->transformCollection($data['mounts'], ShipMount::class),
            'cargo' => new ShipCargo($data['cargo'], $this),
            'transaction' => new ShipModificationTransaction($data['transaction'], $this),
        ];
    }

    /**
     * @return array{agent: Agent, mounts: ShipMount[], cargo: ShipCargo, transaction: ShipModificationTransaction}
     */
    public function removeShipMount(string $shipSymbol, string $mountSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/mounts/remove", ['symbol' => $mountSymbol]);

        return [
            'agent' => new Agent($data['agent'], $this),
            'mounts' => $this->transformCollection($data['mounts'], ShipMount::class),
            'cargo' => new ShipCargo($data['cargo'], $this),
            'transaction' => new ShipModificationTransaction($data['transaction'], $this),
        ];
    }

    /**
     * @return array{transaction: ScrapTransaction}
     */
    public function scrapShipValue(string $shipSymbol): array
    {
        ['data' => $data] = $this->get("my/ships/{$shipSymbol}/scrap");

        return [
            'transaction' => new ScrapTransaction($data['transaction'], $this),
        ];
    }

    /**
     * @return array{agent: Agent, transaction: ScrapTransaction}
     */
    public function scrapShip(string $shipSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/scrap");

        return [
            'agent' => new Agent($data['agent'], $this),
            'transaction' => new ScrapTransaction($data['transaction'], $this),
        ];
    }

    /**
     * @return array{transaction: RepairTransaction}
     */
    public function repairShipValue(string $shipSymbol): array
    {
        ['data' => $data] = $this->get("my/ships/{$shipSymbol}/repair");

        return [
            'transaction' => new RepairTransaction($data['transaction'], $this),
        ];
    }

    /**
     * @return array{agent: Agent, transaction: RepairTransaction}
     */
    public function repairShip(string $shipSymbol): array
    {
        ['data' => $data] = $this->post("my/ships/{$shipSymbol}/repair");

        return [
            'agent' => new Agent($data['agent'], $this),
            'transaction' => new RepairTransaction($data['transaction'], $this),
        ];
    }
}
