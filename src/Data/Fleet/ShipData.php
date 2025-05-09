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

    public function orbit()
    {
        return $this->spaceTraders->fleet()->orbitShip($this->symbol);
    }

    public function refine(ProduceType $produce)
    {
        return $this->spaceTraders->fleet()->shipRefine($this->symbol, $produce);
    }

    public function chart()
    {
        return $this->spaceTraders->fleet()->createChart($this->symbol);
    }

    public function cooldown()
    {
        return $this->spaceTraders->fleet()->getShipCooldown($this->symbol);
    }

    public function dock()
    {
        return $this->spaceTraders->fleet()->dockShip($this->symbol);
    }

    public function survey()
    {
        return $this->spaceTraders->fleet()->createSurvey($this->symbol);
    }

    public function extractResources()
    {
        return $this->spaceTraders->fleet()->extractResources($this->symbol);
    }

    public function siphonResources()
    {
        return $this->spaceTraders->fleet()->siphonResources($this->symbol);
    }

    public function extractResourcesWithSurvey(SurveyData $survey)
    {
        return $this->spaceTraders->fleet()->extractResources($this->symbol, $survey);
    }

    public function jettisonCargo(TradeGoodSymbol $tradeGoodSymbol, int $units)
    {
        return $this->spaceTraders->fleet()->jettison($this->symbol, $tradeGoodSymbol, $units);
    }

    public function jump(string $waypointSymbol)
    {
        return $this->spaceTraders->fleet()->jumpShip($this->symbol, $waypointSymbol);
    }

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

    public function warp(string $waypointSymbol)
    {
        return $this->spaceTraders->fleet()->warpShip($this->symbol, $waypointSymbol);
    }

    public function sellCargo(TradeGoodSymbol $tradeGoodSymbol, int $units)
    {
        return $this->spaceTraders->fleet()->sellCargo($this->symbol, $tradeGoodSymbol, $units);
    }

    public function scanSystems()
    {
        return $this->spaceTraders->fleet()->createShipSystemScan($this->symbol);
    }

    public function scanWaypoints()
    {
        return $this->spaceTraders->fleet()->createShipWaypointScan($this->symbol);
    }

    public function scanShips()
    {
        return $this->spaceTraders->fleet()->createShipShipScan($this->symbol);
    }

    public function refuel(?int $units, ?bool $fromCargo = false)
    {
        return $this->spaceTraders->fleet()->refuelShip($this->symbol, $units, $fromCargo);
    }

    public function purchaseCargo(TradeGoodSymbol $tradeGoodSymbol, int $units)
    {
        return $this->spaceTraders->fleet()->purchaseCargo($this->symbol, $tradeGoodSymbol, $units);
    }

    public function transferCargo(TradeGoodSymbol $tradeGoodSymbol, int $units, string $transferShipSymbol)
    {
        return $this->spaceTraders->fleet()->transferCargo($this->symbol, $tradeGoodSymbol, $units, $transferShipSymbol);
    }

    public function negotiateContract()
    {
        return $this->spaceTraders->fleet()->negotiateContract($this->symbol);
    }

    public function mounts()
    {
        return $this->spaceTraders->fleet()->getMounts($this->symbol);
    }

    public function installMount(string $mountSymbol)
    {
        return $this->spaceTraders->fleet()->installMount($this->symbol, $mountSymbol);
    }

    public function removeMount(string $mountSymbol)
    {
        return $this->spaceTraders->fleet()->removeMount($this->symbol, $mountSymbol);
    }

    public function scrapValue()
    {
        return $this->spaceTraders->fleet()->getScrapShip($this->symbol);
    }

    public function scrap()
    {
        return $this->spaceTraders->fleet()->scrapShip($this->symbol);
    }

    public function repairValue()
    {
        return $this->spaceTraders->fleet()->getRepairShip($this->symbol);
    }

    public function repair()
    {
        return $this->spaceTraders->fleet()->repairShip($this->symbol);
    }
}
