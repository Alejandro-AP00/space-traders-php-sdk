<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Factions;

use AlejandroAPorras\SpaceTraders\Enums\FactionSymbol;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-faction
 *
 * View the details of a faction.
 */
class GetFaction extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/factions/{$this->factionSymbol}";
    }

    /**
     * @param  string  $factionSymbol  The faction symbol
     */
    public function __construct(
        protected FactionSymbol $factionSymbol,
    ) {}
}
