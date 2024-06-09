<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\Deposits;
use AlejandroAPorras\SpaceTraders\Enums\ShipMountSymbol;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class ShipMount extends Resource
{
    public ShipMountSymbol $symbol;

    public string $name;

    public string $description;

    public int $strength;

    /**
     * @var Deposits[]
     */
    public array $deposits;

    public ShipRequirements $requirements;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->deposits = array_map(fn ($deposit) => Deposits::from($deposit), $this->deposits);
    }
}
