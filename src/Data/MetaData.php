<?php

namespace AlejandroAPorras\SpaceTraders\Data;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class MetaData extends DataResource
{
    public int $total;
    public int $page;
    public int $limit;
}
