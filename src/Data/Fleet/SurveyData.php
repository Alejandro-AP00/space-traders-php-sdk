<?php

namespace AlejandroAPorras\SpaceTraders\Data\Fleet;

use AlejandroAPorras\SpaceTraders\Contracts\DataResource;
use AlejandroAPorras\SpaceTraders\Enums\DepositSize;
use AlejandroAPorras\SpaceTraders\SpaceTraders;

class SurveyData extends DataResource
{
    public string $signature;

    public string $symbol;

    /**
     * @var SurveyDepositData[]
     */
    public array $deposits;

    public string $expiration;

    public DepositSize $size;

    public function __construct(array $attributes, ?SpaceTraders $spaceTraders = null)
    {
        parent::__construct($attributes, $spaceTraders);

        if (isset($this->deposits)) {
            $this->deposits = $this->transformCollection($this->deposits, SurveyDepositData::class);
        }
    }
}
