<?php

namespace AlejandroAPorras\SpaceTraders\Data;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;

class SpaceTradersData extends DataResource
{
    public string $status;
    public string $version;
    public string $resetDate;
    public string $description;

    /**
     * @var array{
     *         mostCredits: array<int, array{
     *             agentSymbol: string,
     *             credits: int
     *         }>,
     *         mostSubmittedCharts: array<int, array{
     *             agentSymbol: string,
     *             chartCount: int
     *         }>
     *     }
     */
    public array $leaderboards;

    /**
     * @var array<string, int>
     */
    public array $stats;

    /**
     * @var array<{next: string, frequency: string}>
     */
    public array $serverResets;

    /**
     * @var array<int, array{title: string, body: string}>
     */
    public array $announcements;

    /**
     * @var array<int, array{name: string, url: string}>
     */
    public array $links;
}
