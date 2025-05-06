<?php

namespace AlejandroAPorras\SpaceTraders;

use AlejandroAPorras\SpaceTraders\Resource\Agents;
use AlejandroAPorras\SpaceTraders\Resource\Contracts;
use AlejandroAPorras\SpaceTraders\Resource\Data;
use AlejandroAPorras\SpaceTraders\Resource\Factions;
use AlejandroAPorras\SpaceTraders\Resource\Fleet;
use AlejandroAPorras\SpaceTraders\Resource\GlobalResource;
use AlejandroAPorras\SpaceTraders\Resource\Systems;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\PagedPaginator;

/**
 * SpaceTraders API
 *
 * SpaceTraders is an open-universe game and learning platform that offers a set of HTTP endpoints to control a fleet of ships and explore a multiplayer universe.
 *
 * The API is documented using [OpenAPI](https://github.com/SpaceTradersAPI/api-docs). You can send your first request right here in your browser to check the status of the game server.
 *
 * ```json http
 * {
 *   "method": "GET",
 *   "url": "https://api.spacetraders.io/v2",
 * }
 * ```
 *
 * Unlike a traditional game, SpaceTraders does not have a first-party client or app to play the game. Instead, you can use the API to build your own client, write a script to automate your ships, or try an app built by the community.
 *
 * We have a [Discord channel](https://discord.com/invite/jh6zurdWk5) where you can share your projects, ask questions, and get help from other players.
 */
class SpaceTraders extends Connector implements HasPagination
{
    public function __construct(public readonly string $token) {}

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->token);
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.spacetraders.io/v2';
    }

    public function agents(): Agents
    {
        return new Agents($this);
    }

    public function contracts(): Contracts
    {
        return new Contracts($this);
    }

    public function data(): Data
    {
        return new Data($this);
    }

    public function factions(): Factions
    {
        return new Factions($this);
    }

    public function fleet(): Fleet
    {
        return new Fleet($this);
    }

    public function globalResource(): GlobalResource
    {
        return new GlobalResource($this);
    }

    public function systems(): Systems
    {
        return new Systems($this);
    }

    public function paginate(Request $request): PagedPaginator
    {
        return new class(connector: $this, request: $request) extends PagedPaginator
        {
            protected ?int $perPageLimit = 20;
            protected int $currentPage = 1;

            protected function isLastPage(Response $response): bool
            {
                $meta = $response->json('meta');
                $total = $meta['total'] ?? 0;
                $limit = $meta['limit'] ?? $this->perPageLimit;
                $page = $meta['page'] ?? 1;

                return ($page * $limit) >= $total;
            }

            protected function getPageItems(Response $response, Request $request): array
            {
                return $response->json('data');
            }

            protected function applyPagination(Request $request): Request
            {
                $request->query()->add('page', $this->currentPage);
                $request->query()->add('limit', $this->perPageLimit);

                return $request;
            }
        };
    }
}
