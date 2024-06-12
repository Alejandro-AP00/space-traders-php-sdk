<?php

namespace AlejandroAPorras\SpaceTraders\Actions;

use AlejandroAPorras\SpaceTraders\Enums\FactionSymbol;
use AlejandroAPorras\SpaceTraders\Resources\Faction;
use AlejandroAPorras\SpaceTraders\Support\PaginatedResults;

trait ManagesFactions
{
    /**
     * @return PaginatedResults<Faction>
     */
    public function factions(array $filters = []): PaginatedResults
    {
        return PaginatedResults::make(
            'factions',
            Faction::class,
            $this,
            $filters
        );
    }

    public function faction(FactionSymbol $factionSymbol): Faction
    {
        ['data' => $data] = $this->get("factions/{$factionSymbol->value}");

        return new Faction($data, $this);
    }
}
