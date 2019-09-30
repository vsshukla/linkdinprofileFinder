<?php
/**
 * This file contains the class for Input validation .
 *
 * PHP version 7.3
 */
declare(strict_types=1);

namespace ProfileFinder\Validator;

use ProfileFinder\Exception\ValidationException;

/**
 * Class InputValidator
 * @package ProfileFinder\Validator
 */
class InputValidator
{
    /**
     * Validate Url
     *
     * @param string $url The Remote file url.
     * @return bool true on validation success.
     * @throws ValidationException Throw ValidationException on fail.
     */
    public function validateUrl(string $url): bool
    {
        $message = 'file does not exist on provided location.';
        $header = get_headers($url, 1);
        if (null !== $header[0] && strpos($header[0], "200") !== false) {
            return true;
        }

        throw new ValidationException($message);
    }

    /**
     * Validate Local CSV file.
     *
     * @param string $file The Local CSV file.
     * @return bool TRUE|FALSE
     * @throws ValidationException Throw ValidationException on fail.
     */
    public function validateFile(string $file): bool
    {
        if (!file_exists($file)) {
            throw new ValidationException("File does not exist.");
        }

        if (empty(trim(file_get_contents($file)))) {
            throw new ValidationException("File is empty.");
        }

        if (!in_array(pathinfo($file, PATHINFO_EXTENSION), ['csv','text/csv'])) {
            throw new ValidationException("Please provide valid .csv file format.");
        }

        return true;
    }
}
