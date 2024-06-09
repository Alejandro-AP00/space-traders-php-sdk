<?php

namespace AlejandroAPorras\SpaceTraders\Actions;

use AlejandroAPorras\SpaceTraders\Resources\Agent;
use AlejandroAPorras\SpaceTraders\Support\PaginatedResults;

trait ManagesAgents
{
    public function agent(): Agent
    {
        $response = $this->get('my/agent');
        $data = $response['data'];

        return new Agent($data);
    }

    /**
     * @return PaginatedResults<Agent>
     */
    public function agents(): PaginatedResults
    {
        return PaginatedResults::make(
            'agents',
            Agent::class,
            $this
        );
    }

    public function publicAgent(string $agent): Agent
    {
        $response = $this->get('agents/'.$agent);
        $data = $response['data'];

        return new Agent($data);
    }
}
