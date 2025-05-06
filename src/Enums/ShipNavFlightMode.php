<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Enums;

enum ShipNavFlightMode: string
{
    case DRIFT = 'DRIFT';
    case STEALTH = 'STEALTH';
    case CRUISE = 'CRUISE';
    case BURN = 'BURN';
}
