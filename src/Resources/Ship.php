<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\ProduceType;
use AlejandroAPorras\SpaceTraders\Enums\ShipNavFlightMode;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class Ship extends Resource
{
    public string $symbol;

    public ShipRegistration $registration;

    public ShipNav $nav;

    public ShipCrew $crew;

    public ShipFrame $frame;

    public ShipReactor $reactor;

    public ShipEngine $engine;

    public Cooldown $cooldown;

    /**
     * @var ShipModule[]
     */
    public array $modules;

    /**
     * @var ShipMount[]
     */
    public array $mounts;

    public ShipCargo $cargo;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->modules = $this->transformCollection($this->modules ?: [], ShipModule::class);
        $this->mounts = $this->transformCollection($this->mounts ?: [], ShipMount::class);
    }

    public function cargo(): ShipCargo
    {
        return $this->spaceTraders->shipCargo($this->symbol);
    }

    /**
     * @return array{nav: ShipNav}
     */
    public function orbit(): array
    {
        return $this->spaceTraders->orbitShip($this->symbol);
    }

    /**
     * @return array{cargo: ShipCargo, cooldown: Cooldown, produced: ShipRefineGood[], consumed: ShipRefineGood[]}
     */
    public function refine(ProduceType $produce): array
    {
        return $this->spaceTraders->refineShip($this->symbol, $produce);
    }

    /**
     * @return array{chart: Chart, waypoint: Waypoint}
     */
    public function chart(): array
    {
        return $this->spaceTraders->chartShip($this->symbol);
    }

    public function cooldown(): Cooldown
    {
        return $this->spaceTraders->shipCooldown($this->symbol);
    }

    /**
     * @return array{nav: ShipNav}
     */
    public function dock(): array
    {
        return $this->spaceTraders->dockShip($this->symbol);
    }

    /**
     * @return array{chart: Cooldown, surveys: Survey[]}
     */
    public function survey(): array
    {
        return $this->spaceTraders->createSurvey($this->symbol);
    }

    /**
     * @return array{cooldown: Cooldown, extraction: Extraction, cargo: ShipCargo, events: ShipConditionEvent[]}
     */
    public function extractResources(Survey $survey): array
    {
        return $this->spaceTraders->extractResources($this->symbol, $survey);
    }

    /**
     * @return array{cooldown: Cooldown, siphon: Siphon, cargo: ShipCargo, events: ShipConditionEvent[]}
     */
    public function siphonResources(): array
    {
        return $this->spaceTraders->siphonResources($this->symbol);
    }

    /**
     * @return array{cooldown: Cooldown, extraction: Extraction, cargo: ShipCargo, events: ShipConditionEvent[]}
     */
    public function extractResourcesWithSurvey(Survey $survey): array
    {
        return $this->spaceTraders->extractResources($this->symbol, $survey);
    }

    public function jettisonCargo(TradeGoodSymbol $tradeGoodSymbol, int $units): array
    {
        return $this->spaceTraders->jettisonCargo($this->symbol, $tradeGoodSymbol, $units);
    }

    /**
     * @return array{nav: ShipNav, cooldown: Cooldown, transaction: MarketTransaction, agent: Agent}
     */
    public function jump(): array
    {
        return $this->spaceTraders->jumpShip($this->symbol);
    }

    /**
     * @return array{nav: ShipNav, fuel: ShipFuel, events: ShipConditionEvent[]}
     */
    public function navigate(string $waypointSymbol): array
    {
        return $this->spaceTraders->navigateShip($this->symbol, $waypointSymbol);
    }

    public function patchNav(ShipNavFlightMode $flightMode): ShipNav
    {
        return $this->spaceTraders->patchShipNav($this->symbol, $flightMode);
    }

    public function nav(): ShipNav
    {
        return $this->spaceTraders->shipNav($this->symbol);
    }

    /**
     * @return array{nav: ShipNav, fuel: ShipFuel}
     */
    public function warp(string $waypointSymbol): array
    {
        return $this->spaceTraders->warpShip($this->symbol, $waypointSymbol);
    }

    /**
     * @return array{cargo: ShipCargo, transaction: MarketTransaction, agent: Agent}
     */
    public function sellCargo(TradeGoodSymbol $tradeGoodSymbol, int $units): array
    {
        return $this->spaceTraders->sellCargo($this->symbol, $tradeGoodSymbol, $units);
    }

    /**
     * @return array{systems: ScannedSystem[], cooldown: Cooldown}
     */
    public function scanSystems(): array
    {
        return $this->spaceTraders->scanSystems($this->symbol);
    }

    /**
     * @return array{systems: ScannedWaypoint[], cooldown: Cooldown}
     */
    public function scanWaypoints(): array
    {
        return $this->spaceTraders->scanWaypoints($this->symbol);
    }

    /**
     * @return array{systems: ScannedShip[], cooldown: Cooldown}
     */
    public function scanShips(): array
    {
        return $this->spaceTraders->scanShips($this->symbol);
    }

    /**
     * @return array{fuel: ShipFuel, transaction: MarketTransaction, agent: Agent}
     */
    public function refuel(int $units, bool $fromCargo = false): array
    {
        return $this->spaceTraders->refuelShip($this->symbol, $units, $fromCargo);
    }

    /**
     * @return array{cargo: ShipCargo, transaction: MarketTransaction, agent: Agent}
     */
    public function purchaseCargo(TradeGoodSymbol $tradeGoodSymbol, int $units): array
    {
        return $this->spaceTraders->purchaseCargo($this->symbol, $tradeGoodSymbol, $units);
    }

    /**
     * @return array{cargo: ShipCargo}
     */
    public function transferCargo(TradeGoodSymbol $tradeGoodSymbol, int $units, string $transferShipSymbol): array
    {
        return $this->spaceTraders->transferCargo($this->symbol, $tradeGoodSymbol, $units, $transferShipSymbol);
    }

    /**
     * @return array{contract: Contract}
     */
    public function negotiateContract(): array
    {
        return $this->spaceTraders->negotiateContract($this->symbol);
    }

    /**
     * @return ShipMount[]
     */
    public function mounts(): array
    {
        return $this->spaceTraders->shipMounts($this->symbol);
    }

    /**
     * @return array{agent: Agent, mounts: ShipMount[], cargo: ShipCargo, transaction: ShipModificationTransaction}
     */
    public function installMount(string $mountSymbol): array
    {
        return $this->spaceTraders->installShipMount($this->symbol, $mountSymbol);
    }

    /**
     * @return array{agent: Agent, mounts: ShipMount[], cargo: ShipCargo, transaction: ShipModificationTransaction}
     */
    public function removeMount(string $mountSymbol): array
    {
        return $this->spaceTraders->removeShipMount($this->symbol, $mountSymbol);
    }

    /**
     * @return array{transaction: ScrapTransaction}
     */
    public function scrapValue(): array
    {
        return $this->spaceTraders->scrapShipValue($this->symbol);
    }

    /**
     * @return array{agent: Agent, transaction: ScrapTransaction}
     */
    public function scrap(): array
    {
        return $this->spaceTraders->scrapShip($this->symbol);
    }

    /**
     * @return array{transaction: RepairTransaction}
     */
    public function repairValue(): array
    {
        return $this->spaceTraders->repairShipValue($this->symbol);
    }

    /**
     * @return array{agent: Agent, transaction: RepairTransaction}
     */
    public function repair(): array
    {
        return $this->spaceTraders->repairShip($this->symbol);
    }
}
