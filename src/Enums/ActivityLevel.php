<?php

namespace AlejandroAPorras\SpaceTraders\Enums;

enum ActivityLevel: string
{
    case WEAK = 'WEAK';
    case GROWING = 'GROWING';
    case STRONG = 'STRONG';
    case RESTRICTED = 'RESTRICTED';
}
