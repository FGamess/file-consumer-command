<?php

namespace App\Tests\Unit\Logger;

use App\Logger\FileConsumerLogger as SUT;
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
            'test' => 10,
            'test2' => 4,
            'test3' => 1
        ];
        $this->logger
            ->expects($this->exactly(count($mostFrequentsWords)))
            ->method('info')
        ;
        $this->logger
            ->expects($this->at(0))
            ->method('info')
            ->with('test,10')
        ;
        $this->logger
            ->expects($this->at(1))
            ->method('info')
            ->with('test2,4')
        ;
        $this->logger
            ->expects($this->at(2))
            ->method('info')
            ->with('test3,1')
        ;

        $this->fileConsumerLogger = new SUT($this->logger);
        $this->fileConsumerLogger->outputMostFrequentWords($mostFrequentsWords);
    }
}