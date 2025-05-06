<?php

namespace AlejandroAPorras\SpaceTraders\Data\Systems;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\Enums\WaypointType;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class Waypoint extends DataResource
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

    // public function market(): Market
    // {
    //     return $this->spaceTraders->market($this->systemSymbol, $this->symbol);
    // }

    // public function shipyard(): Shipyard
    // {
    //     return $this->spaceTraders->shipyard($this->systemSymbol, $this->symbol);
    // }

    // public function jumpGate(): JumpGate
    // {
    //     return $this->spaceTraders->jumpGate($this->systemSymbol, $this->symbol);
    // }

    // public function construction(): Construction
    // {
    //     return $this->spaceTraders->construction($this->systemSymbol, $this->symbol);
    // }

    // /**
    //  * @return array{construction: Construction, cargo: ShipCargo}
    //  */
    // public function supplyConstruction(string $shipSymbol, TradeGoodSymbol $tradeSymbol, int $units): array
    // {
    //     return $this->spaceTraders->supplyConstruction($this->systemSymbol, $this->symbol, $shipSymbol, $tradeSymbol, $units);
    // }
}
