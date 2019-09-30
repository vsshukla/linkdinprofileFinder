<?php
/**
 * This file contains the class data transformer.
 *
 * PHP version 7.3
 */

declare(strict_types = 1);

namespace ProfileFinder\Service;

use ProfileFinder\Exception\ArrayTransformationException;

/**
 * Class Transformer
 * @package ProfileFinder\Service
 */
class DataTransformer
{
    
    /**
     * Transform json to array
     *
     * @param string $jsonData to be Transformed.
     * @return array $profileData The linkedin Profile data
     * @throws ArrayTransformationException
     */
    public function transform(string $jsonData): array
    {
        if (empty($jsonData)) {
            throw new ArrayTransformationException('linkedin profile not found.');
        }
        $profileData = json_decode($jsonData, true);

        return $profileData['data']['resultObject'];
    }
}
