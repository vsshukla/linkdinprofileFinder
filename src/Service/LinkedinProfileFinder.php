<?php
/**
 * This file contains the class for find user profile.
 *
 * PHP version 7.3
 */
declare(strict_types = 1);

namespace ProfileFinder\Service;

use ProfileFinder\Exception\ValidationException;
use ProfileFinder\Processor\UrlProcessor;
use ProfileFinder\Validator\InputValidator;

/**
 * Class linkedinProfileFinder
 * @package ProfileFinder\Service
 */
class LinkedinProfileFinder
{

    /**
     * @var InputValidator $validator An instance of InputValidator.
     */
    private $validator;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->validator = new InputValidator();
    }

    /**
     * Get linkedin Profile data.
     *
     * @param string $fileUrl file Url.
     * @return string CSV file path of linkedin profile data.
     * @throws ValidationException
     */
    public function getProfileByUrl(string $fileUrl): string
    {
        if ($this->validator->validateUrl($fileUrl)) {
            $processor = new UrlProcessor();

            return $processor->processUrl($fileUrl);
        }

        throw new ValidationException('No records found from url.');
    }

    /**
     * @param string $file The local csv file.
     * @return string The Linkedin profile CSV file path.
     * @throws ValidationException
     */
    public function getProfileByFile(string $file): string
    {
        if ($this->validator->validateFile($file)) {
            $fileUrl = $_ENV['BASE_URL'].'/upload/'.$file;
            $processor = new UrlProcessor();

            return $processor->processUrl($fileUrl);
        }

        throw new ValidationException('No records found from file.');
    }
}
