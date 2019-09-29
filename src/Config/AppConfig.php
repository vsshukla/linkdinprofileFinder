<?php
/**
 * This file contains constance .
 *
 * PHP version 7.3
 */

declare(strict_types=1);

namespace ProfileFinder\Config;

/**
 * Class AppConfig
 * @package ProfileFinder\Config\AppConfig
 */
class AppConfig
{
    /** @var const BASE_URL The Base url of phantombuster API. */
    const API_URL = 'https://phantombuster.com/api/v1/agent/190170/launch';
    
    /** @var const AUTH_KEY The phantombuster AUTH_KEY. */
    const AUTH_KEY = 'l1aNd83z8UZ8LhD4jKiWyC3xiaOzNKOI';

    /** @var const FILE_FORMAT The valid file format. */
    const FILE_FORMAT = ['csv','text/csv'];
}
