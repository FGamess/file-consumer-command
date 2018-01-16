<?php

namespace App\Command;

use App\Service\StringUtil;
use App\Service\FileConsumer;
use App\Logger\FileConsumerLogger;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Psr\Log\LogLevel;

class FileConsumerCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:consume-file')
            ->setDescription('Consume a file from an URL.')
            ->setHelp('This command allows you to consume a text file from an URL and output the 100 most frequent words')
            ->addArgument(
                'url',
                InputArgument::REQUIRED,
                'resource file url'
            )
            ->addArgument(
                'limit',
                InputArgument::REQUIRED,
                'limit the output of the 100 most frequent words'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Log the 100 most frequent values
        $verbosityLevelMap = array(
            LogLevel::NOTICE => OutputInterface::VERBOSITY_NORMAL,
            LogLevel::INFO   => OutputInterface::VERBOSITY_NORMAL,
        );
        
        $logger = new ConsoleLogger($output, $verbosityLevelMap);
        $container = $this->getContainer();
        $stringUtilService = $container->get(StringUtil::class);
        $output->writeln(
            [
                'FileConsumer tool',
                '=================',
                '',
            ]
        );

        /**
         * Get input arguments
         */
        $fileUrl = $input->getArgument('url');
        $limit = $input->getArgument('limit');


        $output->writeln("Trying to get the file from ".$fileUrl);
        $contentString = $container->get(FileConsumer::class)->getFileContent($fileUrl);
        $logger->info('File content retrieved successfully and converted into string.');

        $output->writeln('Counting all words in string...');
        $wordsCount = $stringUtilService->countWordsInString($contentString);
        $logger->info('Successfully get the number of words  into an array');

        $output->writeln('Counting words duplicates...');
        $wordsDuplicates = $stringUtilService->countWordsDuplicates($wordsCount);
        $logger->info('Successfully get the duplicates into an array');

        $output->writeln('Ascending sort and rerversing of the words duplicates array...');
        $reverseArray = $stringUtilService->reverseSortWordsDuplicates($wordsDuplicates);
        $logger->info('Successfully reversed the array of duplicates');

        $output->writeln('Generating the 100 most frequent values array...');
        $finalArray = $stringUtilService->findMostFrequentValues($reverseArray, $limit);
        $logger->info('Successfully generated the 100 most frequent values array !');

        $output->writeln('');

        $output->writeln('Outputing the 100 most frequet values with their count...');
        
        $fileConsumerLogger = new FileConsumerLogger($logger);
        
        $fileConsumerLogger->outputMostFrequentWords($finalArray);
    }
}