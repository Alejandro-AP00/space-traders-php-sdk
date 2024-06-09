<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

/**
 * Agent details.
 */
class Agent extends Resource
{
    /**
     * Account ID that is tied to this agent. Only included on your own agent.
     */
    public string $accountId;

    /**
     * Symbol of the agent.
     */
    public string $symbol;

    /**
     * The headquarters of the agent.
     */
    public string $headquarters;

    /**
     * The number of credits the agent has available. Credits can be negative if funds have been overdrawn.
     */
    public int $credits;

    /**
     * The faction the agent started with.
     */
    public string $startingFaction;

    /**
     * How many ships are owned by the agent.
     */
    public int $shipCount;
}
