<?php

namespace AlejandroAPorras\SpaceTraders\Enums;

enum ShipFrameSymbol: string
{
    case FRAME_PROBE = 'FRAME_PROBE';
    case FRAME_DRONE = 'FRAME_DRONE';
    case FRAME_INTERCEPTOR = 'FRAME_INTERCEPTOR';
    case FRAME_RACER = 'FRAME_RACER';
    case FRAME_FIGHTER = 'FRAME_FIGHTER';
    case FRAME_FRIGATE = 'FRAME_FRIGATE';
    case FRAME_SHUTTLE = 'FRAME_SHUTTLE';
    case FRAME_EXPLORER = 'FRAME_EXPLORER';
    case FRAME_MINER = 'FRAME_MINER';
    case FRAME_LIGHT_FREIGHTER = 'FRAME_LIGHT_FREIGHTER';
    case FRAME_HEAVY_FREIGHTER = 'FRAME_HEAVY_FREIGHTER';
    case FRAME_TRANSPORT = 'FRAME_TRANSPORT';
    case FRAME_DESTROYER = 'FRAME_DESTROYER';
    case FRAME_CRUISER = 'FRAME_CRUISER';
    case FRAME_CARRIER = 'FRAME_CARRIER';
}