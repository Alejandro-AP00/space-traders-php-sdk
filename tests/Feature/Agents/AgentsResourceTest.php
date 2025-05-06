<?php

use AlejandroAPorras\SpaceTraders\Sdk\SpaceTraders;
use AlejandroAPorras\SpaceTraders\Sdk\Data\Agents\AgentData;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Faking\MockClient;

describe('Agents Resource', function () {
    beforeEach(function () {
        $this->token = 'test-token';
        $this->sdk = new SpaceTraders($this->token);
    });

    test('getMyAgent returns an AgentData object', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Agents/get_my_agent'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $agent = $this->sdk->agents()->getMyAgent();

        // Assert
        expect($agent)->toBeInstanceOf(AgentData::class)
            ->and($agent->symbol)->toBe('BLEDE')
            ->and($agent->headquarters)->toBe('X1-Z44-A1')
            ->and($agent->credits)->toBe(175000)
            ->and($agent->startingFaction)->toBe('ECHO')
            ->and($agent->shipCount)->toBe(2)
            ->and($agent->accountId)->toBe('acc-12345');
    });

    test('getAgents returns a paginated collection of AgentData', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Agents/get_agents'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $paginator = $this->sdk->agents()->getAgents();
        $response = $paginator->current();
        $agents = $response->agents();
        $meta = $response->meta();

        // Assert
        expect($agents)->toBeInstanceOf(Collection::class)
            ->and($agents)->toHaveCount(20)
            ->and($agents->first())->toBeInstanceOf(AgentData::class)
            ->and($meta->total)->toBe(65)
            ->and($meta->page)->toBe(1)
            ->and($meta->limit)->toBe(20);
    });

    test('getAgent returns an AgentData object for a given symbol', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Agents/get_agent'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $agent = $this->sdk->agents()->getAgent('BLEDE');

        // Assert
        expect($agent)->toBeInstanceOf(AgentData::class)
            ->and($agent->symbol)->toBe('BLEDE')
            ->and($agent->headquarters)->toBe('X1-Z44-A1')
            ->and($agent->credits)->toBe(175000)
            ->and($agent->startingFaction)->toBe('ECHO')
            ->and($agent->shipCount)->toBe(2)
            ->and($agent->accountId)->toBeNull();
    });
});
