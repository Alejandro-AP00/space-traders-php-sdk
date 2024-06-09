<?php

namespace AlejandroAPorras\SpaceTraders\Resources;

use AlejandroAPorras\SpaceTraders\Enums\ContractType;
use AlejandroAPorras\SpaceTraders\Enums\FactionSymbol;

class Contract extends Resource
{
    public string $id;

    public FactionSymbol $factionSymbol;

    public ContractType $type;

    public ContractTerms $terms;

    public bool $accepted;

    public bool $fulfilled;

    public string $expiration;

    public string $deadlineToAccept;
}
