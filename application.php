<?php
/**
 * This file is entry point for application.
 *
 * PHP version 7.3
 */

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\Console\Application;
use ProfileFinder\Command\LinkedinProfileFinderCommand;

$dotenv = new Dotenv();
$dotenv->load(__DIR__."/.env.local");
      

$app = new Application();
$app->add(new LinkedinProfileFinderCommand());
$app->run();
