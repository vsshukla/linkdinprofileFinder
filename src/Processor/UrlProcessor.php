<?php
/**
 * This file contains the class for Process File Url to
 * get Linkedin Profile.
 *
 * PHP version 7.3
 */
declare(strict_types = 1);

namespace ProfileFinder\Processor;

use ProfileFinder\Exception\ValidationException;
use ProfileFinder\Service\CsvCreator;
use ProfileFinder\Service\DataTransformer;
use ProfileFinder\Repository\LinkedinProfileRepository;

/**
 * Class UrlProcessor
 * @package ProfileFinder\Processor
 */
class UrlProcessor
{
    /**
     * Process file url to get Linkedin profile.
     *
     * @param string $fileUrl The file url to be process.
     * @return string The CSV file url.
     * @throws ValidationException
     */
    public function processUrl(string $fileUrl): string
    {
        $repository = new LinkedinProfileRepository();
        $response = $repository->getProfileData($fileUrl);

        if (200 !== $response->getStatusCode()) {
            throw new ValidationException('No records found from url.');
        }
        
        $transformer = new DataTransformer();
        $responseBody = $transformer->transform(
            $response->getBody()->getContents()
        );
            
        $createCsv = new CsvCreator();
        return $createCsv->create($responseBody);
    }
}
