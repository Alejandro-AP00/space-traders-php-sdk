<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Resource;

use AlejandroAPorras\SpaceTraders\Sdk\Requests\GlobalResource\GetStatus;
use AlejandroAPorras\SpaceTraders\Sdk\Requests\GlobalResource\Register;
use AlejandroAPorras\SpaceTraders\Sdk\Resource;
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
