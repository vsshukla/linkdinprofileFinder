<?php

/**
 * This file contains the class for Read user input.
 *
 * PHP version 7.3
 */
declare(strict_types = 1);

namespace ProfileFinder\Command;

use ProfileFinder\Service\LinkedinProfileFinder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class LinkedinProfileFinderCommand
 * @package ProfileFinder\Command
 */
class LinkedinProfileFinderCommand extends Command
{
    /** @var static $defaultName The Default Command Name.*/
    protected static $defaultName = 'linkedin-profile:find';
    
    /**
     * Configure commands
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->setDescription('Find Linkedin profile')
            ->setHelp('This command finds Linkedin profile')
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
        $profileFinder = new LinkedinProfileFinder();
        $remoteFile = $input->getOption('remote-path');
        $localFilePath = $input->getOption('local-path');

        if ($remoteFile) {
            $response = $profileFinder->getProfileByUrl($remoteFile);
        }

        if ($localFilePath) {
            $response = $profileFinder->getProfileByFile($localFilePath);
        }

        echo "\n";
        $output->writeln($response);
    }
}
