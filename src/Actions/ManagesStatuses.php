<?php

namespace AlejandroAPorras\SpaceTraders\Actions;

use GuzzleHttp\Exception\GuzzleException;

trait ManagesStatuses
{
    /**
     * @throws GuzzleException
     */
    public function getStatus()
    {
        return $this->get('');
    }
}
