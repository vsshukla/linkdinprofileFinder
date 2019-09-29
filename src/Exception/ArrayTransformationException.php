<?php

/**
 * This file contains exception class for array transformation
 *
 * PHP version 7
 *
 */

declare (strict_types = 1);

namespace ProfileFinder\Exception;

/**
 * Custom exception to be thrown when unexpected error occurred in array transformation
 */
class ArrayTransformationException extends \Exception
{
    /** @var string $message Default message for array transformation exception */
    protected $message = 'Transformation of the array data failed.';

}
