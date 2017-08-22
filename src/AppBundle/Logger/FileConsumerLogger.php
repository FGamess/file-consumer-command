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
        foreach ($mostFrequentValues as $key => $value) {
            $word = key($value);
            $this->logger->info($word.','.$value[$word]);
        }
        
    }
}