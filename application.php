<?php
/**
 * This file is entry point for application.
 *
 * PHP version 7.3
 */

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

use ProfileFinder\Command\LinkedinProfileFinderCommand;

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;

$app = new Application();
$app->add(new LinkedinProfileFinderCommand());
$app->run();
