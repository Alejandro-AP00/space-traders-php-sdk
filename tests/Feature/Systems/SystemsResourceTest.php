<?php

use AlejandroAPorras\SpaceTraders\Data\Fleet\ShipCargoData;
use AlejandroAPorras\SpaceTraders\Data\Systems\ConstructionData;
use AlejandroAPorras\SpaceTraders\Data\Systems\JumpGateData;
use AlejandroAPorras\SpaceTraders\Data\Systems\MarketData;
use AlejandroAPorras\SpaceTraders\Data\Systems\ShipyardData;
use AlejandroAPorras\SpaceTraders\Data\Systems\SystemData;
use AlejandroAPorras\SpaceTraders\Data\Systems\WaypointData;
use AlejandroAPorras\SpaceTraders\Enums\FactionSymbol;
use AlejandroAPorras\SpaceTraders\Enums\ShipType;
use AlejandroAPorras\SpaceTraders\Enums\SystemType;
use AlejandroAPorras\SpaceTraders\Enums\TradeGoodSymbol;
use AlejandroAPorras\SpaceTraders\Enums\WaypointType;
use AlejandroAPorras\SpaceTraders\SpaceTraders;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\PaginationPlugin\PagedPaginator;

describe('Systems Resource', function () {
    beforeEach(function () {
        $this->token = 'test-token';
        $this->sdk = new SpaceTraders($this->token);
    });

    test('getSystems returns a paginated collection of systems', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Systems/get_systems'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $paginator = $this->sdk->systems()->getSystems();

        // Assert
        expect($paginator)->toBeInstanceOf(PagedPaginator::class);

        $response = $paginator->current();
        $systems = $response->systems();
        $meta = $response->meta();

        expect($systems)->toBeInstanceOf(Collection::class)
            ->and($systems)->toHaveCount(2)
            ->and($systems->first())->toBeInstanceOf(SystemData::class)
            ->and($meta->total)->toBe(20)
            ->and($meta->page)->toBe(1)
            ->and($meta->limit)->toBe(2);

        $firstSystem = $systems->first();
        expect($firstSystem->symbol)->toBe('X1-OE')
            ->and($firstSystem->sectorSymbol)->toBe('X1')
            ->and($firstSystem->constellation)->toBe('Orion Expanse')
            ->and($firstSystem->name)->toBe('Orion Expanse')
            ->and($firstSystem->type)->toBe(SystemType::BLACK_HOLE)
            ->and($firstSystem->x)->toBe(0)
            ->and($firstSystem->y)->toBe(0)
            ->and($firstSystem->waypoints)->toHaveCount(2)
            ->and($firstSystem->factions)->toHaveCount(1);
    });

    test('getSystem returns details of a specific system', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Systems/get_system'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $response = $this->sdk->systems()->getSystem('X1-OE');
        $system = $response->system();

        // Assert
        expect($system)->toBeInstanceOf(SystemData::class)
            ->and($system->symbol)->toBe('X1-OE')
            ->and($system->sectorSymbol)->toBe('X1')
            ->and($system->constellation)->toBe('Orion Expanse')
            ->and($system->name)->toBe('Orion Expanse')
            ->and($system->type)->toBe(SystemType::BLACK_HOLE)
            ->and($system->x)->toBe(0)
            ->and($system->y)->toBe(0)
            ->and($system->waypoints)->toHaveCount(2)
            ->and($system->factions)->toHaveCount(1);
    });

    test('getSystemWaypoints returns a paginated collection of waypoints', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Systems/get_system_waypoints'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $paginator = $this->sdk->systems()->getSystemWaypoints('X1-OE');
        $response = $paginator->current();
        $waypoints = $response->waypoints();
        $meta = $response->meta();

        // Assert
        expect($waypoints)->toBeInstanceOf(Collection::class)
            ->and($waypoints)->toHaveCount(2)
            ->and($waypoints->first())->toBeInstanceOf(WaypointData::class)
            ->and($meta->total)->toBe(10)
            ->and($meta->page)->toBe(1)
            ->and($meta->limit)->toBe(2);

        $firstWaypoint = $waypoints->first();
        expect($firstWaypoint->symbol)->toBe('X1-OE-PM')
            ->and($firstWaypoint->type)->toBe(WaypointType::PLANET)
            ->and($firstWaypoint->systemSymbol)->toBe('X1-OE')
            ->and($firstWaypoint->x)->toBe(11)
            ->and($firstWaypoint->y)->toBe(-38)
            ->and($firstWaypoint->orbitals)->toBeArray()
            ->and($firstWaypoint->faction)->not()->toBeNull()
            ->and($firstWaypoint->faction->symbol)->toBe(FactionSymbol::COSMIC)
            ->and($firstWaypoint->traits)->toHaveCount(2)
            ->and($firstWaypoint->isUnderConstruction)->toBeFalse();
    });

    test('getWaypoint returns details of a specific waypoint', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Systems/get_waypoint'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $response = $this->sdk->systems()->getWaypoint('X1-OE', 'X1-OE-PM');
        $waypoint = $response->waypoint();

        // Assert
        expect($waypoint)->toBeInstanceOf(WaypointData::class)
            ->and($waypoint->symbol)->toBe('X1-OE-PM')
            ->and($waypoint->type)->toBe(WaypointType::PLANET)
            ->and($waypoint->systemSymbol)->toBe('X1-OE')
            ->and($waypoint->x)->toBe(11)
            ->and($waypoint->y)->toBe(-38)
            ->and($waypoint->orbitals)->toBeArray()
            ->and($waypoint->faction)->not()->toBeNull()
            ->and($waypoint->faction->symbol)->toBe(FactionSymbol::COSMIC)
            ->and($waypoint->traits)->toHaveCount(2)
            ->and($waypoint->isUnderConstruction)->toBeFalse();
    });

    test('getMarket returns market details for a waypoint', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Systems/get_market'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $response = $this->sdk->systems()->getMarket('X1-OE', 'X1-OE-PM');
        $market = $response->market();

        // Assert
        expect($market)->toBeInstanceOf(MarketData::class)
            ->and($market->symbol)->toBe('X1-OE-PM')
            ->and($market->exports)->toHaveCount(2)
            ->and($market->imports)->toHaveCount(2)
            ->and($market->exchange)->toHaveCount(1)
            ->and($market->transactions)->toHaveCount(1)
            ->and($market->tradeGoods)->toHaveCount(5);

        $firstTradeGood = $market->tradeGoods[0];
        expect($firstTradeGood->symbol)->toBe(TradeGoodSymbol::METALS)
            ->and($firstTradeGood->tradeVolume)->toBe(100)
            ->and($firstTradeGood->supply->value)->toBe('MODERATE')
            ->and($firstTradeGood->purchasePrice)->toBe(50)
            ->and($firstTradeGood->sellPrice)->toBe(45);
    });

    test('getShipyard returns shipyard details for a waypoint', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Systems/get_shipyard'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $response = $this->sdk->systems()->getShipyard('X1-OE', 'X1-OE-S1');
        $shipyard = $response->shipyard();

        // Assert
        expect($shipyard)->toBeInstanceOf(ShipyardData::class)
            ->and($shipyard->symbol)->toBe('X1-OE-S1')
            ->and($shipyard->shipTypes)->toHaveCount(3)
            ->and($shipyard->shipTypes[0])->toBe(ShipType::SHIP_PROBE)
            ->and($shipyard->transactions)->toHaveCount(1)
            ->and($shipyard->ships)->toHaveCount(1)
            ->and($shipyard->modificationsFee)->toBe(15);

        $ship = $shipyard->ships[0];
        expect($ship->type->value)->toBe('SHIP_PROBE')
            ->and($ship->name)->toBe('Probe')
            ->and($ship->purchasePrice)->toBe(70000);
    });

    test('getJumpGate returns jump gate details for a waypoint', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Systems/get_jump_gate'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $response = $this->sdk->systems()->getJumpGate('X1-OE', 'X1-OE-JG');
        $jumpGate = $response->jumpGate();

        // Assert
        expect($jumpGate)->toBeInstanceOf(JumpGateData::class)
            ->and($jumpGate->jumpRange)->toBe(2000)
            ->and($jumpGate->factionSymbol)->toBe(FactionSymbol::COSMIC)
            ->and($jumpGate->connectedSystems)->toHaveCount(2);

        $firstConnectedSystem = $jumpGate->connectedSystems[0];
        expect($firstConnectedSystem->symbol)->toBe('X1-TS')
            ->and($firstConnectedSystem->sectorSymbol)->toBe('X1')
            ->and($firstConnectedSystem->type->value)->toBe('YELLOW_STAR')
            ->and($firstConnectedSystem->distance)->toBe(31.40);
    });

    test('getConstruction returns construction details for a waypoint', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Systems/get_construction'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $response = $this->sdk->systems()->getConstruction('X1-OE', 'X1-OE-C1');
        $construction = $response->construction();

        // Assert
        expect($construction)->toBeInstanceOf(ConstructionData::class)
            ->and($construction->symbol)->toBe('X1-OE-C1')
            ->and($construction->isComplete)->toBeFalse()
            ->and($construction->materials)->toHaveCount(3);

        $firstMaterial = $construction->materials[0];
        expect($firstMaterial->tradeSymbol)->toBe(TradeGoodSymbol::METAL_ORE)
            ->and($firstMaterial->required)->toBe(100)
            ->and($firstMaterial->fulfilled)->toBe(50);
    });

    test('supplyConstruction supplies materials to a construction site', function () {
        // Arrange
        $mock = new MockClient([
            MockResponse::fixture('Systems/supply_construction'),
        ]);
        $this->sdk->withMockClient($mock);

        // Act
        $response = $this->sdk->systems()->supplyConstruction(
            'X1-OE',
            'X1-OE-C1',
            'TEST-SHIP',
            TradeGoodSymbol::IRON_ORE,
            25
        );
        $construction = $response->construction();
        $cargo = $response->cargo();

        // Assert
        expect($construction)->toBeInstanceOf(ConstructionData::class)
            ->and($construction->symbol)->toBe('X1-OE-C1')
            ->and($construction->isComplete)->toBeFalse()
            ->and($construction->materials)->toHaveCount(3);

        $metalOreMaterial = $construction->materials[0];
        expect($metalOreMaterial->tradeSymbol)->toBe(TradeGoodSymbol::METAL_ORE)
            ->and($metalOreMaterial->required)->toBe(100)
            ->and($metalOreMaterial->fulfilled)->toBe(75);

        expect($cargo)->toBeInstanceOf(ShipCargoData::class)
            ->and($cargo->capacity)->toBe(100)
            ->and($cargo->units)->toBe(50)
            ->and($cargo->inventory)->toHaveCount(1)
            ->and($cargo->inventory[0]->symbol)->toBe(TradeGoodSymbol::METAL_ORE)
            ->and($cargo->inventory[0]->units)->toBe(25);
    });
});
