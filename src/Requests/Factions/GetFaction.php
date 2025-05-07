<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Factions;

use AlejandroAPorras\SpaceTraders\Enums\FactionSymbol;
use AlejandroAPorras\SpaceTraders\Responses\Factions\FactionResponse;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

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

    public function createDtoFromResponse(Response $response): mixed
    {
        return FactionResponse::class;
    }
}
