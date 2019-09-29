<?php

declare (strict_types = 1);
namespace ProfileFinder\Exception;

/**
 * Class UrlNotFoundException
 * @package ProfileFinder\Exception
 */
class InvalidFileException extends UrlNotFoundException
{
    /** @var string $message Default message for File validation exception */
    protected $message = 'File not found';

}
