<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Resource;

use Saloon\Http\Response;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Systems\GetConstruction;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Systems\GetJumpGate;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Systems\GetMarket;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Systems\GetShipyard;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Systems\GetSystem;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Systems\GetSystemWaypoints;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Systems\GetSystems;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Systems\GetWaypoint;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\Systems\SupplyConstruction;
use AlejandroAPorras\SpaceTraders\Sdk\Resource;

class Systems extends Resource
{
	/**
	 * @param int $page What entry offset to request
	 * @param int $limit How many entries to return per page
	 */
	public function getSystems(?int $page, ?int $limit): Response
	{
		return $this->connector->send(new GetSystems($page, $limit));
	}


	/**
	 * @param string $systemSymbol The system symbol
	 */
	public function getSystem(string $systemSymbol): Response
	{
		return $this->connector->send(new GetSystem($systemSymbol));
	}


	/**
	 * @param string $systemSymbol The system symbol
	 * @param int $page What entry offset to request
	 * @param int $limit How many entries to return per page
	 * @param string $type Filter waypoints by type.
	 * @param mixed $traits Filter waypoints by one or more traits.
	 */
	public function getSystemWaypoints(
		string $systemSymbol,
		?int $page,
		?int $limit,
		?string $type,
		mixed $traits,
	): Response
	{
		return $this->connector->send(new GetSystemWaypoints($systemSymbol, $page, $limit, $type, $traits));
	}


	/**
	 * @param string $systemSymbol The system symbol
	 * @param string $waypointSymbol The waypoint symbol
	 */
	public function getWaypoint(string $systemSymbol, string $waypointSymbol): Response
	{
		return $this->connector->send(new GetWaypoint($systemSymbol, $waypointSymbol));
	}


	/**
	 * @param string $systemSymbol The system symbol
	 * @param string $waypointSymbol The waypoint symbol
	 */
	public function getMarket(string $systemSymbol, string $waypointSymbol): Response
	{
		return $this->connector->send(new GetMarket($systemSymbol, $waypointSymbol));
	}


	/**
	 * @param string $systemSymbol The system symbol
	 * @param string $waypointSymbol The waypoint symbol
	 */
	public function getShipyard(string $systemSymbol, string $waypointSymbol): Response
	{
		return $this->connector->send(new GetShipyard($systemSymbol, $waypointSymbol));
	}


	/**
	 * @param string $systemSymbol The system symbol
	 * @param string $waypointSymbol The waypoint symbol
	 */
	public function getJumpGate(string $systemSymbol, string $waypointSymbol): Response
	{
		return $this->connector->send(new GetJumpGate($systemSymbol, $waypointSymbol));
	}


	/**
	 * @param string $systemSymbol The system symbol
	 * @param string $waypointSymbol The waypoint symbol
	 */
	public function getConstruction(string $systemSymbol, string $waypointSymbol): Response
	{
		return $this->connector->send(new GetConstruction($systemSymbol, $waypointSymbol));
	}


	/**
	 * @param string $systemSymbol The system symbol
	 * @param string $waypointSymbol The waypoint symbol
	 */
	public function supplyConstruction(string $systemSymbol, string $waypointSymbol): Response
	{
		return $this->connector->send(new SupplyConstruction($systemSymbol, $waypointSymbol));
	}
}
