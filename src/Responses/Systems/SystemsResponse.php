<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Systems;

use AlejandroAPorras\SpaceTraders\Data\Systems\SystemData;
use AlejandroAPorras\SpaceTraders\Traits\HasMetaData;
use Illuminate\Support\Collection;
use Saloon\Http\Response;

class SystemsResponse extends Response
{
    use HasMetaData;

    /**
     * @return Collection<int, SystemData>
     */
    public function systems(): Collection
    {
        return collect($this->json('data'))->map(fn (array $system) => new SystemData($system, $this->getConnector()));
    }
}
