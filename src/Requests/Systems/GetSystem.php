<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Systems;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-system
 *
 * Get the details of a system.
 */
class GetSystem extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/systems/{$this->systemSymbol}";
    }

    /**
     * @param  string  $systemSymbol  The system symbol
     */
    public function __construct(
        protected string $systemSymbol,
    ) {}
}
