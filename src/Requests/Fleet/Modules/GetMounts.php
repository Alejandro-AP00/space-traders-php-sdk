<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Modules;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-mounts
 *
 * Get the mounts installed on a ship.
 */
class GetMounts extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/mounts";
    }

    /**
     * @param  string  $shipSymbol  The ship's symbol.
     */
    public function __construct(
        protected string $shipSymbol,
    ) {}
}
