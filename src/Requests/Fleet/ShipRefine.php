<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet;

use AlejandroAPorras\SpaceTraders\Enums\ProduceType;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * ship-refine
 *
 * Attempt to refine the raw materials on your ship. The request will only succeed if your ship is
 * capable of refining at the time of the request. In order to be able to refine, a ship must have
 * goods that can be refined and have installed a `Refinery` module that can refine it.
 *
 * When refining,
 * 100 basic goods will be converted into 10 processed goods.
 */
class ShipRefine extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/refine";
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship.
     */
    public function __construct(
        protected string $shipSymbol,
        protected ProduceType $produce,
    ) {}

    protected function defaultBody(): array
    {
        return [
            'produce' => $this->produce->value,
        ];
    }
}
