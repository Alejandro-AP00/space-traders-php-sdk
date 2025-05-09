<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Maintenance;

use AlejandroAPorras\SpaceTraders\Responses\Fleet\Maintenance\ScrapShipResponse;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * scrap-ship
 *
 * Scrap a ship, removing it from the game and returning a portion of the ship's value to the agent.
 * The ship must be docked in a waypoint that has the `Shipyard` trait in order to use this function.
 * To preview the amount of value that will be returned, use the Get Ship action.
 */
class ScrapShip extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

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

    public function resolveResponseClass(): string
    {
        return ScrapShipResponse::class;
    }
}
