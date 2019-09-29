<?php
/**
 * This file contains the class for Guzzle Request .
 *
 * PHP version 7.3
 */

declare (strict_types = 1);

namespace ProfileFinder\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/**
 * Class ExternalApiClient
 * @package ProfileFinder\Service
 */
class ExternalApiClient
{
    /**
     * @var Client $client The Guzzle client instance.
     */
    private $client;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * POST Request
     *
     * @param string $url The request Url.
     * @param array $query The request body.
     * @param array $headers The Request Header.
     * @return Response $response The Guzzle response.
     */
    public function post($url, array $query, array $headers): Response
    {
        $response = $this->client->post(
            $url,
            [
                'query' => $query,
                'headers' => $headers,
                'http_errors' => false,
            ]
        );
        return $response;
    }
}
