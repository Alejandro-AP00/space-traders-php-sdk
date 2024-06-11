<?php

namespace AlejandroAPorras\SpaceTraders;

use AlejandroAPorras\SpaceTraders\Exceptions\FailedActionException;
use AlejandroAPorras\SpaceTraders\Exceptions\NotFoundException;
use AlejandroAPorras\SpaceTraders\Exceptions\RateLimitExceededException;
use AlejandroAPorras\SpaceTraders\Exceptions\ValidationException;
use Exception;
use Psr\Http\Message\ResponseInterface;

trait MakesHttpRequests
{
    public function get(string $uri): mixed
    {
        return $this->request('GET', $uri);
    }

    public function post(string $uri, array $payload = []): mixed
    {
        return $this->request('POST', $uri, $payload);
    }

    public function put(string $uri, array $payload = []): mixed
    {
        return $this->request('PUT', $uri, $payload);
    }

    public function patch(string $uri, array $payload = []): mixed
    {
        return $this->request('PATCH', $uri, $payload);
    }

    public function delete(string $uri, array $payload = []): mixed
    {
        return $this->request('DELETE', $uri, $payload);
    }

    protected function request(string $verb, string $uri, array $payload = []): mixed
    {
        if (isset($payload['json'])) {
            $payload = ['json' => $payload['json']];
        } else {
            $payload = empty($payload) ? [] : ['form_params' => $payload];
        }

        $response = $this->client->request($verb, $uri, $payload);

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            $this->handleRequestError($response);
        }

        $responseBody = (string) $response->getBody();

        return json_decode($responseBody, true) ?: $responseBody;
    }

    /**
     * Handle the request error.
     *
     * @throws Exception
     * @throws NotFoundException
     * @throws FailedActionException
     * @throws RateLimitExceededException
     */
    protected function handleRequestError(ResponseInterface $response): void
    {
        if ($response->getStatusCode() === 404) {
            throw new NotFoundException();
        }

        if ($response->getStatusCode() === 422) {
            throw new ValidationException(json_decode($response->getBody(), true)['error']);
        }

        if ($response->getStatusCode() === 400) {
            throw new FailedActionException(json_decode($response->getBody(), true)['error']);
        }

        if ($response->getStatusCode() === 429) {
            throw new RateLimitExceededException(
                $response->hasHeader('x-ratelimit-reset')
                    ? (int) $response->getHeader('x-ratelimit-reset')[0]
                    : null
            );
        }
        throw new Exception((string) $response->getBody());
    }

    protected function buildFilterString(array $filters): string
    {
        if (count($filters) === 0) {
            return '';
        }

        $preparedFilters = [];
        foreach ($filters as $name => $value) {
            $preparedFilters[$name] = urlencode($value);
        }

        return '?'.http_build_query($preparedFilters);
    }
}
