<?php

namespace AlejandroAPorras\SpaceTraders\Traits;

use AlejandroAPorras\SpaceTraders\Data\MetaData;

trait HasMetaData
{
    public function meta(): MetaData
    {
        return new MetaData($this->json('meta'));
    }
}
