<?php

/**
 * This file contains the class for Read user input.
 *
 * PHP version 7.3
 */
declare (strict_types = 1);

namespace ProfileFinder\Command;

use ProfileFinder\Service\LinkdinProfileFinder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class LinkedinProfileFinderCommand
 * @package ProfileFinder\Command\LinkedinProfileFinderCommand
 */

class LinkedinProfileFinderCommand extends Command
{
    /**
     * Configure commands
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->setName('u:input')
            ->setDescription('Read user input')
            ->setHelp('This command prints a message provided by the user')
            ->addOption(
                'local-path',
                'f',
                InputOption::VALUE_REQUIRED,
                'Accept .csv file path',
                false
            )
            ->addOption(
                'remote-path',
                'u',
                InputOption::VALUE_REQUIRED,
                'Accept remote file path',
                false
            );
    }

    /**
     * Execute command
     *
     * @param InputInterface $input The InputInterface
     * @param OutputInterface $output The OutputInterface
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $profileFinder = new LinkdinProfileFinder();
        $remoteFile = $input->getOption('remote-path');
        $localFilePath = $input->getOption('local-path');

        if ($remoteFile) {
            $response = $profileFinder->findProfileByUrl($remoteFile);
        }

        if ($localFilePath) {
            $response = $profileFinder->findProfileByFile($localFilePath);
        }

        echo "\n";
        $output->writeln($response);
    }
}
