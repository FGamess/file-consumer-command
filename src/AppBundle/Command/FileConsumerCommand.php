<?php

namespace AppBundle\Command;

use AppBundle\Service\FileConsumer;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $output->writeln(
            [
                'FileConsumer tool',
                '=================',
                '',
            ]
        );

        $fileUrl = $input->getArgument('url');
        $output->writeln("Trying to get the file from ".$fileUrl);

        $content = $container->get(FileConsumer::class)->getFileContent($fileUrl);
        $output->writeln('File content retrieved successfully.');
    }
}