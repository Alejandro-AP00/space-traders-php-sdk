<?php

namespace AlejandroAPorras\SpaceTraders\Resource;

use AlejandroAPorras\SpaceTraders\Requests\GlobalResource\GetStatus;
use AlejandroAPorras\SpaceTraders\Requests\GlobalResource\Register;
use AlejandroAPorras\SpaceTraders\Resource;
use Saloon\Http\Response;

class GlobalResource extends Resource
{
    public function getStatus(): Response
    {
        return $this->connector->send(new GetStatus);
    }

    public function register(): Response
    {
        return $this->connector->send(new Register);
    }
}
