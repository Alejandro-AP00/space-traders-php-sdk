<?php

namespace AlejandroAPorras\SpaceTraders\Data\Contracts;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class ContractTerms extends DataResource
{
    public string $deadline;

    public ContractPaymentData $payment;

    /**
     * @var ContractDeliverGood[]
     */
    public array $deliver;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->deliver = $this->transformCollection($this->deliver ?: [], ContractDeliverGoodData::class);
    }
}
