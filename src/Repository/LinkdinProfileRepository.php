<?php
/**
 * This file contains the class for Get profile data.
 *
 * PHP version 7.3
 */
declare (strict_types = 1);

namespace ProfileFinder\Repository;

use GuzzleHttp\Psr7\Response;
use ProfileFinder\Config\AppConfig;
use ProfileFinder\Service\ExternalApiClient;

/**
 * Class LinkdinProfileRepository.
 * @package ProfileFinder\Repository\LinkdinProfileRepository.
 */
class LinkdinProfileRepository
{
    /**
     * get Linkdin Profile data.
     *
     * @param string $fileUrl file Url to upload in phantomBuster API.
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
            AppConfig::API_URL,
            $query,
            ['X-Phantombuster-Key-1' => AppConfig::AUTH_KEY]
        );
    }
}
