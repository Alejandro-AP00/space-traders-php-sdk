<?php

namespace AlejandroAPorras\SpaceTraders\Resource;

use AlejandroAPorras\SpaceTraders\Requests\GlobalResource\GetStatus;
use AlejandroAPorras\SpaceTraders\Requests\GlobalResource\Register;
use AlejandroAPorras\SpaceTraders\Resource;
use AlejandroAPorras\SpaceTraders\Responses\Globals\RegisterAgentResponse;
use AlejandroAPorras\SpaceTraders\Responses\Globals\StatusResponse;
use Saloon\Http\Response;

class GlobalResource extends Resource
{
    public function getStatus(): StatusResponse
    {
        return $this->connector->send(new GetStatus);
    }

    public function register(): RegisterAgentResponse
    {
        return $this->connector->send(new Register);
    }
}
