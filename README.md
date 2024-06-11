# A Space Traders SDK for PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alejandro-ap00/space-traders-php-sdk.svg?style=flat-square)](https://packagist.org/packages/alejandro-ap00/space-traders-php-sdk)
[![Tests](https://img.shields.io/github/actions/workflow/status/Alejandro-AP00/space-traders-php-sdk/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/Alejandro-AP00/space-traders-php-sdk/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/alejandro-ap00/space-traders-php-sdk.svg?style=flat-square)](https://packagist.org/packages/alejandro-ap00/space-traders-php-sdk)

An PHP SDK for the [SpaceTraders](https://spacetraders.io/) API this package provides an expressive way to interact with
all endpoints available.

## Installation

You can install the package via composer:

```bash
composer require alejandro-ap00/space-traders-php-sdk
```

## Usage

To get started, please create an instance of the SDK

```php
use AlejandroAPorras\SpaceTraders;

$space_traders = new SpaceTraders('Your JWT bearer token');
```

### Handling Pagination

There are several methods, such as `agents()`, `contracts()` and `ships()` to will return paginated results. To
get the next page of results just call next() on a result. If there are no more results, that method returns null.

On paginated results, there are also some more convenience methods:

- `results()`: get the results. A results object is also iterable, so you can also get to the results by simply using
  the
  object in a loop
- `next()`: fetch the next page of results
- `previous()`: fetch the previous page of results
- `currentPage()`: get the current page number
- `total()`: get the total number of results across all pages
- `totalPages()`: get the total number of pages
- `nextPage()`: get the page number for the next page of results
- `previousPage()`: get the page number for the previous page of results

### Registering

You can generate a new token using the register method

```php
use AlejandroAPorras\SpaceTraders\Enums\FactionSymbol;

$space_traders->register(FactionSymbol::COSMIC, 'T3ST_US3R', 'your@email.com')
```

### Getting API status

```php
$space_traders->getStatus();
```

### Managing Contracts

```php
$space_traders->contracts(['page' => 1]);
$space_traders->contract(string $contractId);
$space_traders->acceptContract(string $contractId);
$space_traders->deliverContract(string $contractId, string $shipSymbol, TradeGoodSymbol $tradeSymbol, int $units);
$space_traders->fulfillContract(string $contractId);
```

On a `Contract` instance you can call

```php
$contract->accept();
$contract->deliver(string $shipSymbol, TradeGoodSymbol $tradeSymbol, int $units);
$contract->fulfill();
```

### Managing Agents

```php
$space_traders->agent();
$space_traders->agents(['page' => 1]);
$space_traders->publicAgent(string $agent);
```

### Managing Factions

```php
$space_traders->factions(['page' => 1]);
$space_traders->faction();
```

### Managing Fleet

```php
$space_traders->ships(['page' => 1]);
$space_traders->purchaseShip(ShipType $shipType, string $waypointSymbol);
$space_traders->ship(string $shipSymbol);
$space_traders->shipCargo(string $shipSymbol);
$space_traders->orbitShip(string $shipSymbol);
$space_traders->refineShip(string $shipSymbol, ProduceType $produce);
$space_traders->chartShip(string $shipSymbol);
$space_traders->shipCooldown(string $shipSymbol);
$space_traders->dockShip(string $shipSymbol);
$space_traders->createSurvey(string $shipSymbol);
$space_traders->extractResources(string $shipSymbol, Survey $survey);
$space_traders->createSurvey(string $shipSymbol);
$space_traders->siphonResources(string $shipSymbol);
$space_traders->extractResourcesWithSurvey(string $shipSymbol, Survey $survey);
$space_traders->jettisonCargo(string $shipSymbol, TradeGoodSymbol $symbol, int $units);
$space_traders->jumpShip(string $shipSymbol);
$space_traders->navigateShip(string $shipSymbol, string $waypointSymbol);
$space_traders->patchShipNav(string $shipSymbol, ShipNavFlightMode $flightMode);
$space_traders->shipNav(string $shipSymbol);
$space_traders->warpShip(string $shipSymbol, string $waypointSymbol);
$space_traders->sellCargo(string $shipSymbol, TradeGoodSymbol $symbol, int $units);
$space_traders->scanSystems(string $shipSymbol);
$space_traders->scanWaypoints(string $shipSymbol);
$space_traders->scanShips(string $shipSymbol);
$space_traders->refuelShip(string $shipSymbol, int $units, bool $fromCargo = false);
$space_traders->purchaseCargo(string $shipSymbol, TradeGoodSymbol $symbol, int $units);
$space_traders->transferCargo(string $shipSymbol, TradeGoodSymbol $symbol, int $units, string $transferShipSymbol);
$space_traders->negotiateContract(string $shipSymbol);
$space_traders->shipMounts(string $shipSymbol);
$space_traders->installShipMount(string $shipSymbol, string $mountSymbol);
$space_traders->removeShipMount(string $shipSymbol, string $mountSymbol);
$space_traders->scrapShipValue(string $shipSymbol);
$space_traders->scrapShip(string $shipSymbol);
$space_traders->repairShipValue(string $shipSymbol);
$space_traders->repairShip(string $shipSymbol);
```

On a `Ship` instance you can call

```php
$ship->cargo();
$ship->orbit();
$ship->refine(ProduceType $produce);
$ship->chart();
$ship->cooldown();
$ship->dock();
$ship->survey();
$ship->extractResources(Survey $survey);
$ship->siphonResources();
$ship->extractResourcesWithSurvey(Survey $survey);
$ship->jettisonCargo(TradeGoodSymbol $tradeGoodSymbol, int $units);
$ship->jump();
$ship->navigate(string $waypointSymbol);
$ship->patchNav(ShipNavFlightMode $flightMode);
$ship->nav();
$ship->warp(string $waypointSymbol);
$ship->sellCargo(TradeGoodSymbol $tradeGoodSymbol, int $units);
$ship->scanSystems();
$ship->scanWaypoints();
$ship->scanShips();
$ship->refuel(int $units, bool $fromCargo = false);
$ship->purchaseCargo(TradeGoodSymbol $tradeGoodSymbol, int $units);
$ship->transferCargo(TradeGoodSymbol $tradeGoodSymbol, int $units, string $transferShipSymbol);
$ship->negotiateContract();
$ship->mounts();
$ship->installMount(string $mountSymbol);
$ship->removeMount(string $mountSymbol);
$ship->scrapValue();
$ship->scrap();
$ship->repairValue();
$ship->repair();

```

### Managing Systems

```php
$space_traders->systems(['page' => 1]);
$space_traders->system(string $systemSymbol);
$space_traders->waypoints(string $systemSymbol, ['page' => 1]);
$space_traders->waypoint(string $systemSymbol, string $waypointSymbol);
$space_traders->market(string $systemSymbol, string $waypointSymbol);
$space_traders->shipyard(string $systemSymbol, string $waypointSymbol);
$space_traders->jumpGate(string $systemSymbol, string $waypointSymbol);
$space_traders->construction(string $systemSymbol, string $waypointSymbol);
$space_traders->supplyConstruction(string $systemSymbol, string $waypointSymbol, string $shipSymbol, TradeGoodSymbol $tradeSymbol, int $units);
```

On a `System` instance you can call

```php
$system->waypoints();
```

and in a `Waypoint` instance you can call

```php
$waypoint->market();
$waypoint->shipyard();
$waypoint->jumpGate();
$waypoint->construction();
$waypoint->supplyConstruction(string $shipSymbol, TradeGoodSymbol $tradeSymbol, int $units);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Alejandro A](https://github.com/Alejandro-AP00)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
