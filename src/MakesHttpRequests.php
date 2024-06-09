<?php

namespace AlejandroAPorras\SpaceTraders;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

trait MakesHttpRequests
{
    /**
     * Make a GET request to Forge servers and return the response.
     *
     * @throws GuzzleException
     */
    public function get(string $uri): mixed
    {
        return $this->request('GET', $uri);
    }

    /**
     * Make a POST request to Forge servers and return the response.
     *
     * @throws GuzzleException
     */
    public function post(string $uri, array $payload = []): mixed
    {
        return $this->request('POST', $uri, $payload);
    }

    /**
     * Make a PUT request to Forge servers and return the response.
     *
     * @throws GuzzleException
     */
    public function put(string $uri, array $payload = []): mixed
    {
        return $this->request('PUT', $uri, $payload);
    }

    /**
     * Make a DELETE request to Forge servers and return the response.
     *
     * @throws GuzzleException
     */
    public function delete(string $uri, array $payload = []): mixed
    {
        return $this->request('DELETE', $uri, $payload);
    }

    /**
     * Make request to Forge servers and return the response.
     *
     * @throws GuzzleException
     * @throws Exception
     */
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
     *
     * @throws Exception
//     * @throws \Laravel\Forge\Exceptions\FailedActionException
//     * @throws \Laravel\Forge\Exceptions\NotFoundException
//     * @throws \Laravel\Forge\Exceptions\ValidationException
//     * @throws \Laravel\Forge\Exceptions\RateLimitExceededException
     */
    protected function handleRequestError(ResponseInterface $response): void
    {
        //        if ($response->getStatusCode() == 422) {
        //            throw new ValidationException(json_decode((string) $response->getBody(), true));
        //        }
        //
        //        if ($response->getStatusCode() == 404) {
        //            throw new NotFoundException();
        //        }
        //
        //        if ($response->getStatusCode() == 400) {
        //            throw new FailedActionException((string) $response->getBody());
        //        }
        //
        //        if ($response->getStatusCode() === 429) {
        //            throw new RateLimitExceededException(
        //                $response->hasHeader('x-ratelimit-reset')
        //                    ? (int) $response->getHeader('x-ratelimit-reset')[0]
        //                    : null
        //            );
        //        }
        throw new Exception((string) $response->getBody());
    }
}
