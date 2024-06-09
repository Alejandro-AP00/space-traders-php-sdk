<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\SpaceTraders;

class ContractTerms extends Resource
{
    public string $deadline;

    public ContractPayment $payment;

    /**
     * @var ContractDeliverGood[]
     */
    public array $deliver;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->deliver = $this->transformCollection($this->deliver ?: [], ContractDeliverGood::class);
    }
}
