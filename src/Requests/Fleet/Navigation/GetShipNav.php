<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Navigation;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-ship-nav
 *
 * Get the current nav status of a ship.
 */
class GetShipNav extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/nav";
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function __construct(
        protected string $shipSymbol,
    ) {}
}
