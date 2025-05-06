<?php

namespace AlejandroAPorras\SpaceTraders\Requests\GlobalResource;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get-status
 *
 * Return the status of the game server.
 * This also includes a few global elements, such as
 * announcements, server reset dates and leaderboards.
 */
class GetStatus extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/';
    }

    public function __construct() {}
}
