<?php

namespace AlejandroAPorras\SpaceTraders\Responses\Fleet\Scanning;

use AlejandroAPorras\SpaceTraders\Data\CooldownData;
use AlejandroAPorras\SpaceTraders\Data\Fleet\SurveyData;
use Saloon\Http\Response;

class SurveyResponse extends Response
{
    public function cooldown(): CooldownData
    {
        return new CooldownData($this->json('data.cooldown'), $this->getConnector());
    }

    /**
     * Get the surveys
     *
     * @return array<SurveyData>
     */
    public function surveys(): array
    {
        $data = $this->json('data.surveys');

        return array_map(
            fn (array $survey) => new SurveyData($survey, $this->getConnector()),
            $data
        );
    }
}
