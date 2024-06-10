<?php

namespace AlejandroAPorras\SpaceTraders\Actions;

use AlejandroAPorras\SpaceTraders\Enums\FactionSymbol;
use AlejandroAPorras\SpaceTraders\Resources\Agent;
use AlejandroAPorras\SpaceTraders\Resources\Contract;
use AlejandroAPorras\SpaceTraders\Resources\Faction;
use AlejandroAPorras\SpaceTraders\Resources\Ship;

trait ManagesRegistrations
{
    public function register(FactionSymbol $faction, string $agent, ?string $email = null): array
    {
        ['data' => $data] = $this->post('register', [
            'faction' => $faction->value,
            'symbol' => $agent,
            'email' => $email,
        ]);

        return [
            'agent' => new Agent($data['agent'], $this),
            'contract' => new Contract($data['contract'], $this),
            'faction' => new Faction($data['faction'], $this),
            'ship' => new Ship($data['ship'], $this),
            'token' => $data['token'],
        ];
    }
}
