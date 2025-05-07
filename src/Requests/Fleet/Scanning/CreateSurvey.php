<?php

namespace AlejandroAPorras\SpaceTraders\Requests\Fleet\Scanning;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * create-survey
 *
 * Create surveys on a waypoint that can be extracted such as asteroid fields. A survey focuses on
 * specific types of deposits from the extracted location. When ships extract using this survey, they
 * are guaranteed to procure a high amount of one of the goods in the survey.
 *
 * In order to use a
 * survey, send the entire survey details in the body of the extract request.
 *
 * Each survey may have
 * multiple deposits, and if a symbol shows up more than once, that indicates a higher chance of
 * extracting that resource.
 *
 * Your ship will enter a cooldown after surveying in which it is unable to
 * perform certain actions. Surveys will eventually expire after a period of time or will be exhausted
 * after being extracted several times based on the survey's size. Multiple ships can use the same
 * survey for extraction.
 *
 * A ship must have the `Surveyor` mount installed in order to use this
 * function.
 */
class CreateSurvey extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/my/ships/{$this->shipSymbol}/survey";
    }

    /**
     * @param  string  $shipSymbol  The symbol of the ship.
     */
    public function __construct(
        protected string $shipSymbol,
    ) {}
}
