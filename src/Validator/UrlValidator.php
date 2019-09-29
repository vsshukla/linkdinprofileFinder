<?php
/**
 * This file contains the class for validate Url.
 *
 * PHP version 7.3
 */
declare (strict_types = 1);

namespace ProfileFinder\Validator;

use ProfileFinder\Exception\InvalidUrlException;

class UrlValidator
{
    /**
     * Validate Url
     *
     * @param string $url Remote file url.
     * @return bool true on validation success.
     * @throws InvalidUrlException Throw InvalidUrlException on fail.
     */
    public function validate(string $url): bool
    {
        $message = 'file does not exist on provided location.';
        $header = get_headers($url, 1);
        if (null !== $header[0] && strpos($header[0], "200") !== false) {
            return true;
        }

        throw new InvalidUrlException($message);
    }

}
