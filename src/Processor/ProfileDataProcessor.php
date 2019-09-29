<?php
namespace ProfileFinder\Processor;

use GuzzleHttp\Psr7\Response;
use ProfileFinder\Service\CreateCsv;
use ProfileFinder\Service\DataTransformer;

class ProfileDataProcessor
{
    public function processData(Response $response): string
    {
        if (200 === $response->getStatusCode()) {
            $transformer = new DataTransformer();
            $createCsv = new CreateCsv();
            $responseBody = $transformer->transform(
                $response->getBody()->getContents()
            );

            return $createCsv->create($responseBody);
        }
    }
}
