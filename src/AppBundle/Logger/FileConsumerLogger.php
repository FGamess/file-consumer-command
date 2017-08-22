<?php

namespace AppBundle\Logger;

use Psr\Log\LoggerInterface;

class FileConsumerLogger
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function outputMostFrequentWords(array $mostFrequentValues)
    {
        foreach ($mostFrequentValues as $word => $count) {
            $this->logger->info($word.','.$count);
        }
        
    }
}