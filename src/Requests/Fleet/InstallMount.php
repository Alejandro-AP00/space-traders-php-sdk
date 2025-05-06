<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Fleet;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * install-mount
 *
 * Install a mount on a ship.
 *
 * In order to install a mount, the ship must be docked and located in a
 * waypoint that has a `Shipyard` trait. The ship also must have the mount to install in its cargo
 * hold.
 *
 * An installation fee will be deduced by the Shipyard for installing the mount on the ship.
 */
class InstallMount extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/mounts/install";
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
