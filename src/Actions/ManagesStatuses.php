<?php

namespace AlejandroAPorras\SpaceTraders\Actions;

trait ManagesStatuses
{
    public function getStatus()
    {
        return $this->get('');
    }
}
