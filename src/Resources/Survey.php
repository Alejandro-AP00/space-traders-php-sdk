<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\DepositSize;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class Survey extends Resource
{
    public string $signature;

    public string $symbol;

    /**
     * @var SurveyDeposit[]
     */
    public array $deposits;

    public string $expiration;

    public DepositSize $size;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        $this->deposits = $this->transformCollection($this->deposits ?: [], SurveyDeposit::class);
    }
}
