<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Cargo;

use AlejandroAPorras\SpaceTraders\Enums\DepositSize;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * extract-resources-with-survey
 *
 * Use a survey when extracting resources from a waypoint. This endpoint requires a survey as the
 * payload, which allows your ship to extract specific yields.
 *
 * Send the full survey object as the
 * payload which will be validated according to the signature. If the signature is invalid, or any
 * properties of the survey are changed, the request will fail.
 */
class ExtractResourcesWithSurvey extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/extract/survey";
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     * @param  list<array{symbol: string}>  $deposits
     */
    public function __construct(
        protected string $shipSymbol,
        protected string $signature,
        protected string $symbol,
        protected array $deposits,
        protected string $expiration,
        protected DepositSize $size
    ) {}

    // TODO: Replace with Survey DTO
    protected function defaultBody(): array
    {
        return [
            'signature' => $this->signature,
            'symbol' => $this->symbol,
            'deposits' => $this->deposits,
            'expiration' => $this->expiration,
            'size' => $this->size->value,
        ];
    }
}
