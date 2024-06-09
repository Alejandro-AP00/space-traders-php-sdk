<?php

namespace AlejandroAPorras\SpaceTraders;

use AlejandroAPorras\SpaceTraders\Actions\ManagesRegistrations;
use AlejandroAPorras\SpaceTraders\Actions\ManagesStatuses;
use GuzzleHttp\Client;

class SpaceTraders
{
    use MakesHttpRequests, ManagesRegistrations, ManagesStatuses;

    protected string $token;

    public Client $client;

    public function __construct($token = null)
    {
        if (! is_null($token)) {
            $this->setToken($token);
        }
    }

    public function setToken($token, $guzzle = null): static
    {
        $this->token = $token;

        $this->client = $guzzle ?: new Client([
            'base_uri' => 'https://api.spacetraders.io/v2/',
            'headers' => [
                'Authorization' => 'Bearer '.$this->token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
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
