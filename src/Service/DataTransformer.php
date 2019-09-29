<?php
/**
 * This file contains the class data transformer.
 *
 * PHP version 7.3
 */

declare (strict_types = 1);

namespace ProfileFinder\Service;

use ProfileFinder\Exception\ArrayTransformationException;

/**
 * Class Transformer
 * @package ProfileFinder\Service\DataTransformer
 */

class DataTransformer
{
    /**
     * Transform json to array
     *
     * @param string $data to be Transformed.
     * @return array $arrayData The Linkdin Profile data.
     */
    public function transform(string $data): array
    {
        if (empty($data)) {
            throw new ArrayTransformationException('Linkdin profile not found.');
        }
        $arrayData = json_decode($data, true);

        return $arrayData['data']['resultObject'];
    }
}
