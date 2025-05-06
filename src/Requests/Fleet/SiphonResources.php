<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Fleet;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * siphon-resources
 *
 * Siphon gases or other resources from gas giants.
 *
 * The ship must be in orbit to be able to siphon and
 * must have siphon mounts and a gas processor installed.
 */
class SiphonResources extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/siphon";
    }

    /**
     * @param  string  $shipSymbol  The ship symbol.
     */
    public function __construct(
        protected string $shipSymbol,
    ) {}
}
