<?php

namespace AlejandroAPorras\SpaceTraders\Sdk\Requests\Fleet;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * extract-resources-with-survey
 *
 * Use a survey when extracting resources from a waypoint. This endpoint requires a survey as the
 * payload, which allows your ship to extract specific yields.
 *
 * Send the full survey object as the
 * payload which will be validated according to the signature. If the signature is invalid, or any
 * properties of the survey are changed, the request will fail.
 */
class ExtractResourcesWithSurvey extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/my/ships/{$this->shipSymbol}/extract/survey";
	}


	/**
	 * @param string $shipSymbol The ship symbol.
	 */
	public function __construct(
		protected string $shipSymbol,
	) {
	}
}
