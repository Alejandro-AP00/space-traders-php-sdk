<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Data;

use Spatie\LaravelData\Data;

class MetaData extends Data
{
    public function __construct(
        public int $total,
        public int $page,
        public int $limit,
    ) {
    }
}
