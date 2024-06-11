<?php

namespace AlejandroAPorras\SpaceTraders;

use AlejandroAPorras\SpaceTraders\Actions\ManagesAgents;
use AlejandroAPorras\SpaceTraders\Actions\ManagesContracts;
use AlejandroAPorras\SpaceTraders\Actions\ManagesFactions;
use AlejandroAPorras\SpaceTraders\Actions\ManagesFleet;
use AlejandroAPorras\SpaceTraders\Actions\ManagesRegistrations;
use AlejandroAPorras\SpaceTraders\Actions\ManagesStatuses;
use AlejandroAPorras\SpaceTraders\Actions\ManagesSystems;
use GuzzleHttp\Client;

class SpaceTraders
{
    use MakesHttpRequests,
        ManagesAgents,
        ManagesContracts,
        ManagesFactions,
        ManagesFleet,
        ManagesRegistrations,
        ManagesStatuses,
        ManagesSystems;

    protected ?string $token;

    public Client $client;

    public function __construct($token)
    {
        $this->setToken($token);
    }

    public function setToken($token, $guzzle = null): static
    {
        $this->token = $token;

        $this->client = $guzzle ?: new Client([
            'http_errors' => false,
            'base_uri' => 'https://api.spacetraders.io/v2/',
            'headers' => [
                'Authorization' => 'Bearer '.$this->token ?? '',
                'Accept' => 'application/json',
            ],
        ]);

        return $this;
    }

    protected function transformCollection($collection, $class, $extraData = []): array
    {
        return array_map(function ($data) use ($class, $extraData) {
            return new $class($data + $extraData, $this);
        }, $collection);
    }
}
