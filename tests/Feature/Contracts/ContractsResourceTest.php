<?php

use AlejandroAPorras\SpaceTraders\Data\Agents\AgentData;
use AlejandroAPorras\SpaceTraders\Data\Contracts\ContractData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipCargoData;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\SpaceTraders;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\PaginationPlugin\PagedPaginator;

describe('Contracts Resource', function () {
    beforeEach(function () {
        $this->token = 'test-token';
        $this->sdk = new SpaceTraders($this->token);
    });

    test('getContracts returns a paginated collection of contracts', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Contracts/get_contracts'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $paginator = $this->sdk->contracts()->getContracts();

        // Assert
        expect($paginator)->toBeInstanceOf(PagedPaginator::class);

        $response = $paginator->current();
        $contracts = $response->contracts();
        $meta = $response->meta();

        expect($contracts)->toBeInstanceOf(Collection::class)
            ->and($contracts)->toHaveCount(2)
            ->and($contracts->first())->toBeInstanceOf(ContractData::class)
            ->and($meta->total)->toBe(2)
            ->and($meta->page)->toBe(1)
            ->and($meta->limit)->toBe(10);

        $firstContract = $contracts->first();
        expect($firstContract->id)->toBe('clsw7n00g000008ml4uowdp2s')
            ->and($firstContract->factionSymbol->value)->toBe('COSMIC')
            ->and($firstContract->type->value)->toBe('PROCUREMENT')
            ->and($firstContract->accepted)->toBeFalse()
            ->and($firstContract->fulfilled)->toBeFalse();
    });

    test('getContract returns a contract for a given ID', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Contracts/get_contract'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $response = $this->sdk->contracts()->getContract('clsw7n00g000008ml4uowdp2s');
        $contract = $response->contract();

        // Assert
        expect($contract)->toBeInstanceOf(ContractData::class)
            ->and($contract->id)->toBe('clsw7n00g000008ml4uowdp2s')
            ->and($contract->factionSymbol->value)->toBe('COSMIC')
            ->and($contract->type->value)->toBe('PROCUREMENT')
            ->and($contract->accepted)->toBeFalse()
            ->and($contract->fulfilled)->toBeFalse()
            ->and($contract->terms->deadline)->toBe('2024-06-01T00:00:00.000Z')
            ->and($contract->terms->payment->onAccepted)->toBe(10000)
            ->and($contract->terms->payment->onFulfilled)->toBe(50000);

        $deliverTerms = $contract->terms->deliver[0];
        expect($deliverTerms->tradeSymbol->value)->toBe('IRON_ORE')
            ->and($deliverTerms->destinationSymbol)->toBe('X1-TEST-A1')
            ->and($deliverTerms->unitsRequired)->toBe(100)
            ->and($deliverTerms->unitsFulfilled)->toBe(0);
    });

    test('acceptContract accepts a contract and returns the updated agent and contract', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Contracts/accept_contract'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $response = $this->sdk->contracts()->acceptContract('clsw7n00g000008ml4uowdp2s');
        $agent = $response->agent();
        $contract = $response->contract();

        // Assert
        expect($agent)->toBeInstanceOf(AgentData::class)
            ->and($agent->symbol)->toBe('TEST_AGENT')
            ->and($agent->credits)->toBe(165000);

        expect($contract)->toBeInstanceOf(ContractData::class)
            ->and($contract->id)->toBe('clsw7n00g000008ml4uowdp2s')
            ->and($contract->accepted)->toBeTrue()
            ->and($contract->fulfilled)->toBeFalse();
    });

    test('deliverContract delivers goods to a contract and returns the updated contract and cargo', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Contracts/deliver_contract'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $response = $this->sdk->contracts()->deliverContract(
            contractId: 'clsw7n00g000008ml4uowdp2s',
            shipSymbol: 'TEST_SHIP',
            tradeSymbol: TradeGoodSymbol::IRON_ORE,
            units: 50
        );
        $contract = $response->contract();
        $cargo = $response->cargo();

        // Assert
        expect($contract)->toBeInstanceOf(ContractData::class)
            ->and($contract->id)->toBe('clsw7n00g000008ml4uowdp2s')
            ->and($contract->terms->deliver[0]->unitsFulfilled)->toBe(50);

        expect($cargo)->toBeInstanceOf(ShipCargoData::class)
            ->and($cargo->capacity)->toBe(100)
            ->and($cargo->units)->toBe(50)
            ->and($cargo->inventory)->toHaveCount(1)
            ->and($cargo->inventory[0]->symbol->value)->toBe('IRON_ORE')
            ->and($cargo->inventory[0]->units)->toBe(50);
    });

    test('fulfillContract fulfills a contract and returns the updated agent and contract', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Contracts/fulfill_contract'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $response = $this->sdk->contracts()->fulfillContract('clsw7n00g000008ml4uowdp2s');
        $agent = $response->agent();
        $contract = $response->contract();

        // Assert
        expect($agent)->toBeInstanceOf(AgentData::class)
            ->and($agent->symbol)->toBe('TEST_AGENT')
            ->and($agent->credits)->toBe(215000);

        expect($contract)->toBeInstanceOf(ContractData::class)
            ->and($contract->id)->toBe('clsw7n00g000008ml4uowdp2s')
            ->and($contract->fulfilled)->toBeTrue()
            ->and($contract->terms->deliver[0]->unitsFulfilled)->toBe(100);
    });
});
