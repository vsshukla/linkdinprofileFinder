<?php
/**
 * This file contains the class for Validation Exception.
 *
 * PHP version 7.3
 */
declare(strict_types = 1);
namespace ProfileFinder\Exception;

/*  Custom exception to be thrown when unexpected error occurred in User input validation */
class ValidationException extends \Exception
{
    /** @var string $message Default message for user's
     * input validation exception
     */
    protected $message = 'Input validation failed';
}
