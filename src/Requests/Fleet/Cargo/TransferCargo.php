<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Cargo;

use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\Responses\Fleet\Cargo\TransferCargoResponse;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * transfer-cargo
 *
 * Transfer cargo between ships.
 *
 * The receiving ship must be in the same waypoint as the transferring
 * ship, and it must able to hold the additional cargo after the transfer is complete. Both ships also
 * must be in the same state, either both are docked or both are orbiting.
 *
 * The response body's cargo
 * shows the cargo of the transferring ship after the transfer is complete.
 */
class TransferCargo extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/transfer";
    }

    /**
     * @param  string  $shipSymbol  The transferring ship's symbol.
     */
    public function __construct(
        protected string $shipSymbol,
        protected TradeGoodSymbol $tradeGoodSymbol,
        protected int $units,
        protected string $transferToShipSymbol
    ) {}

    protected function defaultBody(): array
    {
        return [
            'tradeSymbol' => $this->tradeGoodSymbol->value,
            'units' => $this->units,
            'shipSymbol' => $this->transferToShipSymbol,
        ];
    }

    public function resolveResponseClass(): string
    {
        return TransferCargoResponse::class;
    }
}
