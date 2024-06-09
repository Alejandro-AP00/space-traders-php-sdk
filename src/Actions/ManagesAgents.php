<?php

namespace AlejandroAPorras\SpaceTraders\Actions;

use AlejandroAPorras\SpaceTraders\Resources\Agent;
use AlejandroAPorras\SpaceTraders\Support\PaginatedResults;

trait ManagesAgents
{
    public function agent(): Agent
    {
        ['data' => $data] = $this->get('my/agent');

        return new Agent($data, $this);
    }

    /**
     * @return PaginatedResults<Agent>
     */
    public function agents(array $filters = []): PaginatedResults
    {
        return PaginatedResults::make(
            'agents',
            Agent::class,
            $this,
            $filters
        );
    }

    public function publicAgent(string $agent): Agent
    {
        ['data' => $data] = $this->get("agents/{$agent}");

        return new Agent($data, $this);
    }
}
