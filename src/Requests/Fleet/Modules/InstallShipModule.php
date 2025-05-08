<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Modules;

use AlejandroAPorras\SpaceTraders\Responses\Fleet\Modules\InstallShipModuleResponse;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * install-ship-module
 *
 * Install a module on a ship. The module must be in your cargo.
 */
class InstallShipModule extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/modules/install";
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship
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

    public function resolveResponseClass(): string
    {
        return InstallShipModuleResponse::class;
    }
}
