<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-ship-cooldown
 *
 * Retrieve the details of your ship's reactor cooldown. Some actions such as activating your jump
 * drive, scanning, or extracting resources taxes your reactor and results in a cooldown.
 *
 * Your ship
 * cannot perform additional actions until your cooldown has expired. The duration of your cooldown is
 * relative to the power consumption of the related modules or mounts for the action taken.
 *
 * Response
 * returns a 204 status code (no-content) when the ship has no cooldown.
 */
class GetShipCooldown extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/cooldown";
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship.
     */
    public function __construct(
        protected string $shipSymbol,
    ) {}
}
