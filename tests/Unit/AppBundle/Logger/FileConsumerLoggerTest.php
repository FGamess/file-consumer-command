<?php

namespace Tests\Unit\AppBundle\Logger;

use AppBundle\Logger\FileConsumerLogger as SUT;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class FileConsumerLogger extends TestCase
{
    /**
     * Subject under test
     *
     * @var FileConsumerLogger
     */
    public $fileConsumerLogger;

    /**
     *
     * @var LoggerInterface
     */
    private $logger;

    /**
     * outputMostFrequentWords method outputs log infos
     *
     * @test
     */
    public function outputMostFrequentWordsLogsInfos()
    {
        $this->logger = $this->createMock(LoggerInterface::class);
        $mostFrequentsWords = [
            0 => [
                'test' => 10
            ],
            1 => [
                'test2' => 4
            ],
            2 => [
                'test3' => 1
            ]
        ];
        $this->logger
            ->expects($this->exactly(count($mostFrequentsWords)))
            ->method('info')
        ;

        $this->fileConsumerLogger = new SUT($this->logger);
        $this->fileConsumerLogger->outputMostFrequentWords($mostFrequentsWords);
    }
}