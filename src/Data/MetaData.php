<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Data;

use AlejandroAPorras\SpaceTraders\Sdk\Contracts\DataResource;

class MetaData extends DataResource
{
    public int $total;
    public int $page;
    public int $limit;
}
