<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Data;

use Spatie\LaravelData\Data;

class AgentData extends Data
{
    public function __construct(
        public string $symbol,
        public string $headquarters,
        public int $credits,
        public string $startingFaction,
        public int $shipCount,
        public ?string $accountId = null,
    ) {
    }
}
