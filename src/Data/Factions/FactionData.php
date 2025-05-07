<?php

namespace AlejandroAPorras\SpaceTraders\Data\Factions;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\FactionSymbol;

class FactionData extends DataResource
{
    public FactionSymbol $symbol;

    public string $name;

    public string $description;

    public ?string $headquarters;

    public array $traits;

    public bool $isRecruiting;
}
