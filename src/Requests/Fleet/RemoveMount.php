<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * remove-mount
 *
 * Remove a mount from a ship.
 *
 * The ship must be docked in a waypoint that has the `Shipyard` trait,
 * and must have the desired mount that it wish to remove installed.
 *
 * A removal fee will be deduced
 * from the agent by the Shipyard.
 */
class RemoveMount extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/mounts/remove";
    }

    /**
     * @param  string  $shipSymbol  The ship's symbol.
     */
    public function __construct(
        protected string $shipSymbol,
        protected string $symbol
    ) {}

    protected function defaultBody(): array
    {
        return [
            'symbol' => $this->symbol,
        ];
    }
}
