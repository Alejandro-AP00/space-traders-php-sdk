<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Enums\ProduceType;
use AlejandroAPorras\SpaceTraders\Enums\ShipNavFlightMode;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class ShipData extends DataResource
{
    public string $symbol;

    public ShipRegistrationData $registration;

    public ShipNavData $nav;

    public ShipCrewData $crew;

    public ShipFrameData $frame;

    public ShipReactorData $reactor;

    public ShipEngineData $engine;

    public CooldownData $cooldown;

    /**
     * @var ShipModuleData[]
     */
    public array $modules;

    /**
     * @var ShipMountData[]
     */
    public array $mounts;

    public ShipCargoData $cargo;

    public ShipFuelData $fuel;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->modules = $this->transformCollection($this->modules ?: [], ShipModuleData::class);
        $this->mounts = $this->transformCollection($this->mounts ?: [], ShipMountData::class);
    }

    public function cargo()
    {
        return $this->spaceTraders->fleet()->getMyShipCargo($this->symbol);
    }

    /**
     * @return array{nav: ShipNavData}
     */
    public function orbit()
    {
        return $this->spaceTraders->fleet()->orbitShip($this->symbol);
    }

    /**
     * @return array{cargo: ShipCargoData, cooldown: CooldownData, produced: ShipRefineGoodData[], consumed: ShipRefineGoodData[]}
     */
    public function refine(ProduceType $produce)
    {
        return $this->spaceTraders->fleet()->refineShip($this->symbol, $produce);
    }

    /**
     * @return array{chart: ChartData, waypoint: WaypointData}
     */
    public function chart()
    {
        return $this->spaceTraders->fleet()->chartShip($this->symbol);
    }

    public function cooldown()
    {
        return $this->spaceTraders->fleet()->getShipCooldown($this->symbol);
    }

    /**
     * @return array{nav: ShipNavData}
     */
    public function dock()
    {
        return $this->spaceTraders->fleet()->dockShip($this->symbol);
    }

    /**
     * @return array{cooldown: CooldownData, surveys: SurveyData[]}
     */
    public function survey()
    {
        return $this->spaceTraders->fleet()->createSurvey($this->symbol);
    }

    /**
     * @return array{cooldown: CooldownData, extraction: ExtractionData, cargo: ShipCargoData, events: ShipConditionEventData[]}
     */
    public function extractResources()
    {
        return $this->spaceTraders->fleet()->extractResources($this->symbol);
    }

    /**
     * @return array{cooldown: CooldownData, siphon: SiphonData, cargo: ShipCargoData, events: ShipConditionEventData[]}
     */
    public function siphonResources()
    {
        return $this->spaceTraders->fleet()->siphonResources($this->symbol);
    }

    /**
     * @return array{cooldown: CooldownData, extraction: ExtractionData, cargo: ShipCargoData, events: ShipConditionEventData[]}
     */
    public function extractResourcesWithSurvey(SurveyData $survey)
    {
        return $this->spaceTraders->fleet()->extractResources($this->symbol, $survey);
    }

    public function jettisonCargo(TradeGoodSymbol $tradeGoodSymbol, int $units)
    {
        return $this->spaceTraders->fleet()->jettison($this->symbol, $tradeGoodSymbol, $units);
    }

    /**
     * @return array{nav: ShipNavData, cooldown: CooldownData, transaction: MarketTransactionData, agent: AgentData}
     */
    public function jump(string $waypointSymbol)
    {
        return $this->spaceTraders->fleet()->jumpShip($this->symbol, $waypointSymbol);
    }

    /**
     * @return array{nav: ShipNavData, fuel: ShipFuelData, events: ShipConditionEventData[]}
     */
    public function navigate(string $waypointSymbol)
    {
        return $this->spaceTraders->fleet()->navigateShip($this->symbol, $waypointSymbol);
    }

    public function patchNav(ShipNavFlightMode $flightMode)
    {
        return $this->spaceTraders->fleet()->patchShipNav($this->symbol, $flightMode);
    }

    public function nav()
    {
        return $this->spaceTraders->fleet()->getShipNav($this->symbol);
    }

    /**
     * @return array{nav: ShipNavData, fuel: ShipFuelData}
     */
    public function warp(string $waypointSymbol)
    {
        return $this->spaceTraders->fleet()->warpShip($this->symbol, $waypointSymbol);
    }

    /**
     * @return array{cargo: ShipCargoData, transaction: MarketTransactionData, agent: AgentData}
     */
    public function sellCargo(TradeGoodSymbol $tradeGoodSymbol, int $units)
    {
        return $this->spaceTraders->fleet()->sellCargo($this->symbol, $tradeGoodSymbol, $units);
    }

    /**
     * @return array{systems: ScannedSystemData[], cooldown: CooldownData}
     */
    public function scanSystems()
    {
        return $this->spaceTraders->fleet()->createShipSystemScan($this->symbol);
    }

    /**
     * @return array{waypoints: ScannedWaypointData[], cooldown: CooldownData}
     */
    public function scanWaypoints()
    {
        return $this->spaceTraders->fleet()->createShipWaypointScan($this->symbol);
    }

    /**
     * @return array{systems: ScannedShipData[], cooldown: CooldownData}
     */
    public function scanShips()
    {
        return $this->spaceTraders->fleet()->createShipShipScan($this->symbol);
    }

    /**
     * @return array{fuel: ShipFuelData, transaction: MarketTransactionData, agent: AgentData}
     */
    public function refuel(?int $units, ?bool $fromCargo = false)
    {
        return $this->spaceTraders->fleet()->refuelShip($this->symbol, $units, $fromCargo);
    }

    /**
     * @return array{cargo: ShipCargoData, transaction: MarketTransactionData, agent: AgentData}
     */
    public function purchaseCargo(TradeGoodSymbol $tradeGoodSymbol, int $units)
    {
        return $this->spaceTraders->fleet()->purchaseCargo($this->symbol, $tradeGoodSymbol, $units);
    }

    /**
     * @return array{cargo: ShipCargoData}
     */
    public function transferCargo(TradeGoodSymbol $tradeGoodSymbol, int $units, string $transferShipSymbol)
    {
        return $this->spaceTraders->fleet()->transferCargo($this->symbol, $tradeGoodSymbol, $units, $transferShipSymbol);
    }

    /**
     * @return array{contract: ContractData}
     */
    public function negotiateContract()
    {
        return $this->spaceTraders->fleet()->negotiateContract($this->symbol);
    }

    /**
     * @return ShipMountData[]
     */
    public function mounts()
    {
        return $this->spaceTraders->fleet()->getMounts($this->symbol);
    }

    /**
     * @return array{agent: AgentData, mounts: ShipMountData[], cargo: ShipCargoData, transaction: ShipModificationTransactionData}
     */
    public function installMount(string $mountSymbol)
    {
        return $this->spaceTraders->fleet()->installMount($this->symbol, $mountSymbol);
    }

    /**
     * @return array{agent: AgentData, mounts: ShipMountData[], cargo: ShipCargoData, transaction: ShipModificationTransactionData}
     */
    public function removeMount(string $mountSymbol)
    {
        return $this->spaceTraders->fleet()->removeMount($this->symbol, $mountSymbol);
    }

    /**
     * @return array{transaction: ScrapTransactionData}
     */
    public function scrapValue()
    {
        return $this->spaceTraders->fleet()->getScrapShip($this->symbol);
    }

    /**
     * @return array{agent: AgentData, transaction: ScrapTransactionData}
     */
    public function scrap()
    {
        return $this->spaceTraders->fleet()->scrapShip($this->symbol);
    }

    /**
     * @return array{transaction: RepairTransactionData}
     */
    public function repairValue()
    {
        return $this->spaceTraders->fleet()->getRepairShip($this->symbol);
    }

    /**
     * @return array{agent: AgentData, transaction: RepairTransactionData}
     */
    public function repair()
    {
        return $this->spaceTraders->fleet()->repairShip($this->symbol);
    }
}
