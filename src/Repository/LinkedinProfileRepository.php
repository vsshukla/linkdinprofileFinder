<?php
/**
 * This file contains the class for Get profile data.
 *
 * PHP version 7.3
 */
declare(strict_types = 1);

namespace ProfileFinder\Repository;

use GuzzleHttp\Psr7\Response;
use ProfileFinder\Service\ExternalApiClient;

/**
 * Class LinkedinProfileRepository.
 * @package ProfileFinder\Repository.
 */
class LinkedinProfileRepository
{
    /**
     * Get Linkedin Profile data.
     *
     * @param string $fileUrl file Url to pass in PhantomBuster API.
     * @return Response The Guzzle Response Object.
     */
    public function getProfileData(string $fileUrl): Response
    {
        echo "fetching profile data....\n";
        $apiClient = new ExternalApiClient();
        $query = [
            'output' => 'first-result-object',
            'argument' => [
                "spreadsheetUrl" => $fileUrl,
                "csvName" => "result",
            ],
        ];

        return $apiClient->post(
            $_ENV['API_URL'],
            $query,
            ['X-Phantombuster-Key-1' => $_ENV['AUTHORIZATION_KEY']]
        );
    }
}
