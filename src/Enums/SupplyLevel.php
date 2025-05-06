<?php

namespace AlejandroAPorras\SpaceTraders\Enums;

enum SupplyLevel: string
{
    case SCARCE = 'SCARCE';
    case LIMITED = 'LIMITED';
    case MODERATE = 'MODERATE';
    case HIGH = 'HIGH';
    case ABUNDANT = 'ABUNDANT';
}
