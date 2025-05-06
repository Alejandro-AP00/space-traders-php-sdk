<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-scrap-ship
 *
 * Get the amount of value that will be returned when scrapping a ship.
 */
class GetScrapShip extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/scrap";
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function __construct(
        protected string $shipSymbol,
    ) {}
}
