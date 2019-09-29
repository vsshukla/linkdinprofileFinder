<?php

declare (strict_types = 1);
namespace ProfileFinder\Exception;

/**
 * Class UrlNotFoundException
 * @package ProfileFinder\Exception
 */
class UrlNotFoundException extends \Exception
{
    /** @var string $message Default message for Url validation exception */
    protected $message = 'Data not found on provided Url';

}
