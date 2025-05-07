<?php

namespace AlejandroAPorras\SpaceTraders\Resource;

use AlejandroAPorras\SpaceTraders\Enums\FactionSymbol;
use AlejandroAPorras\SpaceTraders\Requests\Factions\GetFaction;
use AlejandroAPorras\SpaceTraders\Requests\Factions\GetFactions;
use AlejandroAPorras\SpaceTraders\Resource;
use AlejandroAPorras\SpaceTraders\Responses\Factions\FactionResponse;
use Saloon\PaginationPlugin\PagedPaginator;

class Factions extends Resource
{
    /**
     * Return a paginated list of all the factions in the game.
     *
     * @param  int  $page  What entry offset to request
     * @param  int  $limit  How many entries to return per page
     */
    public function getFactions(): PagedPaginator
    {
        return $this->connector->paginate(new GetFactions);
    }

    /**
     * View the details of a faction.
     *
     * @param  FactionSymbol  $factionSymbol  The faction symbol
     */
    public function getFaction(FactionSymbol $factionSymbol): FactionResponse
    {
        return $this->connector->send(new GetFaction($factionSymbol));
    }
}
