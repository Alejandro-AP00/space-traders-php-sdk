<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\Enums\WaypointType;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class Waypoint extends Resource
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

    public WaypointFaction $faction;

    /**
     * @var WaypointTrait[]
     */
    public array $traits;

    /**
     * @var WaypointModifier[]
     */
    public array $modifiers;

    public Chart $chart;

    public bool $isUnderConstruction;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->orbitals = $this->transformCollection($this->orbitals ?: [], WaypointOrbital::class);
        $this->traits = $this->transformCollection($this->traits ?: [], WaypointTrait::class);
        $this->modifiers = $this->transformCollection($this->modifiers ?: [], WaypointModifier::class);
    }

    public function market(): Market
    {
        return $this->spaceTraders->market($this->systemSymbol, $this->symbol);
    }

    public function shipyard(): Shipyard
    {
        return $this->spaceTraders->shipyard($this->systemSymbol, $this->symbol);
    }

    public function jumpGate(): JumpGate
    {
        return $this->spaceTraders->jumpGate($this->systemSymbol, $this->symbol);
    }

    public function construction(): Construction
    {
        return $this->spaceTraders->construction($this->systemSymbol, $this->symbol);
    }

    /**
     * @return array{construction: Construction, cargo: ShipCargo}
     */
    public function supplyConstruction(string $shipSymbol, TradeGoodSymbol $tradeSymbol, int $units): array
    {
        return $this->spaceTraders->supplyConstruction($this->systemSymbol, $this->symbol, $shipSymbol, $tradeSymbol, $units);
    }
}
