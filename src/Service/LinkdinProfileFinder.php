<?php
/**
 * This file contains the class for find user profile.
 *
 * PHP version 7.3
 */
declare (strict_types = 1);

namespace ProfileFinder\Service;

use ProfileFinder\Exception\InvalidUrlException;
use ProfileFinder\Processor\ProfileDataProcessor;
use ProfileFinder\Repository\LinkdinProfileRepository;
use ProfileFinder\Validator\UrlValidator;

/**
 * Class LinkdinProfileFinder
 * @package ProfileFinder\Service
 */
class LinkdinProfileFinder
{
    /**
     * Get Linkdin Profile data.
     *
     * @param string $fileUrl file Url.
     * @return string CSV file path of Linkdin profile data.
     */
    public function findProfileByUrl(string $fileUrl): string
    {
        $validator = new UrlValidator();
        if ($validator->validate($fileUrl)) {
            $repository = new LinkdinProfileRepository();
            $processor = new ProfileDataProcessor();

            return $processor->processData(
                $repository->getProfileData($fileUrl)
            );
        }

        throw new InvalidUrlException('No records found from url.');
    }

/*
public function findProfileByFile(string $fileUrl): ?string
{
$validator = new InputValidator();
if ($validator->validateUrl($fileUrl)) {
$repository = new LinkdinProfileRepository();
$response = $repository->getProfileData($fileUrl);
}
return 'Error: could not process request.';
}
 */
}
