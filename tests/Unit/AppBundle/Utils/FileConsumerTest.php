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
     * getFileContent method must return an array when the file exists
     *
     * @test
     */
    public function getFileContentReturnsArray()
    {
        $this->initializeSUT();

        $actual = $this->fileConsumer->getFileContent('https://s3-eu-west-1.amazonaws.com/secretsales-dev-test/interview/flatland.txt');

        $this->assertInternalType('array', $actual);
    }

    /**
     * getFileContent method returns an empty array, when resource is not found
     *
     * @test
     * @expectedException PHPUnit\Framework\Error\Error
     * @expectedExceptionMessageRegExp /^file\(.+\): failed to open stream: No such file or directory$/
     */
    public function getFileContentTriggerPHPError()
    {
        $this->initializeSUT();

        $this->fileConsumer->getFileContent('/resource/url');
    }
}