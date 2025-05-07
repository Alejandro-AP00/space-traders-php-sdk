<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Scanning;

use AlejandroAPorras\SpaceTraders\Responses\Fleet\Scanning\ChartResponse;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * create-chart
 *
 * Command a ship to chart the waypoint at its current location.
 *
 * Most waypoints in the universe are
 * uncharted by default. These waypoints have their traits hidden until they have been charted by a
 * ship.
 *
 * Charting a waypoint will record your agent as the discoverer.
 *
 * If the waypoint is already
 * charted, you will not gain any new information by charting it again.
 */
class CreateChart extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/chart";
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship.
     */
    public function __construct(
        protected string $shipSymbol,
    ) {}

    public function createDtoFromResponse(Response $response): mixed
    {
        return ChartResponse::class;
    }
}
