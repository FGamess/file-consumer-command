<?php

namespace Tests\Unit\AppBundle\Service;

use AppBundle\Service\FileConsumer as SUT;
use PHPUnit\Framework\TestCase;

class FileConsumerTest extends TestCase
{
    /**
     * FileConsumer
     *
     * @var FileConsumer
     */
    public $fileConsumer;

    public function setUp()
    {

    }

    private function initializeSUT()
    {
        $this->fileConsumer = new SUT();
    }

    /**
     * getFileContent method must return an array
     *
     * @test
     */
    public function getFileContentReturnsArray()
    {
        $this->initializeSUT();

        $actual = $this->fileConsumer->getFileContent('/resource/url');

        $this->assertInternalType('array', $actual);
    }
}