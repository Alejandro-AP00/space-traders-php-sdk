<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Enums;

enum ShipNavStatus: string
{
    case IN_TRANSIT = 'IN_TRANSIT';
    case IN_ORBIT = 'IN_ORBIT';
    case DOCKED = 'DOCKED';
}
