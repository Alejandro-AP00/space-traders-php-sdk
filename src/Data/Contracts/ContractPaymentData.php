<?php

namespace AlejandroAPorras\SpaceTraders\Data\Contracts;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;

class ContractPaymentData extends DataResource
{
    public int $onAccepted;

    public int $onFulfilled;
}
