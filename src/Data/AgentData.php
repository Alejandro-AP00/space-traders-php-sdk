<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Data;

use AlejandroAPorras\SpaceTraders\Sdk\Contracts\DataResource;

class AgentData extends DataResource
{
    public string $symbol;
    public string $headquarters;
    public int $credits;
    public string $startingFaction;
    public int $shipCount;
    public ?string $accountId = null;
}
