<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class ShipMountData extends DataResource
{
    public string $symbol;

    public string $name;

    public string $description;

    public int $strength;

    /**
     * @var string[]
     */
    public array $deposits;

    public ShipRequirementsData $requirements;

    /**
     * @var string[]
     */
    public array $features;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->deposits = $this->deposits ?: [];
        $this->features = $this->features ?: [];
    }
}
