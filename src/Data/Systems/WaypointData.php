<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\Enums\WaypointType;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class WaypointData extends DataResource
{
    public string $symbol;

    public WaypointType $type;

    public string $systemSymbol;

    public int $x;

    public int $y;

    /**
     * @var WaypointOrbital[]
     */
    public array $orbitals;

    public WaypointFactionData $faction;

    /**
     * @var WaypointTrait[]
     */
    public array $traits;

    /**
     * @var WaypointModifier[]
     */
    public array $modifiers;

    public ChartData $chart;

    public bool $isUnderConstruction;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->orbitals = $this->transformCollection($this->orbitals ?: [], WaypointOrbitalData::class);
        $this->traits = $this->transformCollection($this->traits ?: [], WaypointTraitData::class);
        $this->modifiers = $this->transformCollection($this->modifiers ?: [], WaypointModifierData::class);
    }

    public function market()
    {
        return $this->spaceTraders->systems()->getMarket($this->systemSymbol, $this->symbol);
    }

    public function shipyard()
    {
        return $this->spaceTraders->systems()->getShipyard($this->systemSymbol, $this->symbol);
    }

    public function jumpGate()
    {
        return $this->spaceTraders->systems()->getJumpGate($this->systemSymbol, $this->symbol);
    }

    public function construction()
    {
        return $this->spaceTraders->systems()->getConstruction($this->systemSymbol, $this->symbol);
    }

    public function supplyConstruction(string $shipSymbol, TradeGoodSymbol $tradeSymbol, int $units)
    {
        return $this->spaceTraders->systems()->supplyConstruction($this->systemSymbol, $this->symbol, $shipSymbol, $tradeSymbol, $units);
    }
}
